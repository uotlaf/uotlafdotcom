<?php

namespace App\Console\Commands;

use App\Models\Art;
use App\Models\Artist;
use App\Models\ArtTag;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class update_arts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:update_arts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update arts data from storage/import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $arts = Storage::disk('arts')->allFiles();

            foreach ($arts as $art) {
                $info = json_decode(Storage::disk('arts')->get($art), true);

                // Separa os itens que não vão pro modelo
                $artists = $info['artist'];
                $personas = $info['personas'];
                $tags = $info['tags'];
                $links = $info['links'];
                unset($info['artist'], $info['personas'], $info['tags'], $info['links']);

                $model = Art::updateOrCreate(
                    ["identifier" => $info['identifier']],
                    $info
                );

                // Update artists
                foreach ($artists as $name) {
                    $artist = Artist::where('name', $name)->first();
                    if (!$artist) {
                        throw new Exception("Artist {$name} not found for art {$model->identifier}");
                    }
                    $model->artists()->syncWithoutDetaching($artist->id);
                }

                // Update personas
                foreach ($personas as $name) {
                    $persona = \App\Models\Persona::where('name', $name)->first();
                    if (!$persona) {
                        throw new Exception("Persona {$name} not found for art {$model->identifier}");
                    }
                    $model->personas()->syncWithoutDetaching($persona->id);
                }

                // Update tags
                foreach ($tags as $name) {
                    $tag = \App\Models\ArtTag::where('name', $name)->first();
                    if (!$tag) {
                        $tag = new ArtTag(['name' => $name]);
                        $tag->save();
                    }
                    $model->tags()->syncWithoutDetaching($tag->id);
                }

                // Update links
                foreach ($links as $name => $values) {
                    $model->links()->updateOrCreate(
                        ["name" => $name],
                        [
                            "link" => $values['link'],
                            "icon" => $values['icon'],
                        ]
                    );
                }
            }
        });
    }
}
