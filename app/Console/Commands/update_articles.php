<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArtTag;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class update_articles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:update_articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $views = File::allFiles(resource_path("views/articles")); // Views ficam na pasta resource

            foreach ($views as $viewfile) {
                // Pegar as infos do início do arquivo
                $info_str = [];
                preg_match('/{{---[\S\s*]*---}}/', File::get($viewfile), $info_str);
                $info_str = explode("\n",
                    str_replace("{{---\n", '',
                        str_replace("\n---}}", '', $info_str[0])));

                $data = [];
                $tags = [];
                foreach ($info_str as $info) {
                    $line = explode(':', $info, 2);
                    if ($line[0] == "tags") {
                        $tags = explode(";", $line[1]);
                    } else {
                        $data[$line[0]] = $line[1];
                    }
                }

                // Data convertion part
                if (array_key_exists('hide_from_posts', $data)) {
                    $data['hide_from_posts'] = boolval($data['hide_from_posts']);
                }

                // Add no banco
                $model = Article::updateOrCreate(
                    [
                        'identifier' => $data['identifier'],
                        'language' => $data['language']
                    ],
                    $data
                );

                // Adiciona as tags no banco
                foreach ($tags as $tagname) {
                    if (empty($tagname)) {
                        continue;
                    }
                    $tag = ArticleTag::where('name', $tagname)->first();
                    if (!$tag) {
                        $tag = new ArticleTag(['name' => $tagname]);
                        $tag->save();
                    }
                    $model->tags()->syncWithoutDetaching($tag->id);
                }
            }
        });
    }
}
