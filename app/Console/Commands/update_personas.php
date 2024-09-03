<?php

namespace App\Console\Commands;

use App\Models\Persona;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class update_personas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:update_personas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update persona data from storage/import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::transaction(function () {
            $personas = Storage::disk('personas')->allFiles();

            foreach ($personas as $persona) {
                $info = json_decode(Storage::disk('personas')->get($persona), true);

                Persona::updateOrCreate(
                    ['identifier' => $info['identifier']],
                    $info
                );
            }
        });
    }
}
