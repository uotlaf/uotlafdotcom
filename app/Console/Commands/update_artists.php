<?php

namespace App\Console\Commands;

use App\Models\Artist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class update_artists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:update_artists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update artists data from storage/import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $artists = Storage::disk('artists')->allFiles();

            foreach ($artists as $artist) {
                $info = json_decode(Storage::disk('artists')->get($artist), true);

                Artist::updateOrCreate(
                    ['identifier' => $info['identifier']],
                    $info
                );
            }
        });
    }
}
