<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class update_all extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:update_all';

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
        $this->call('site:update_artists');
        $this->call('site:update_personas');
        $this->call('site:update_arts');
        $this->call('site:update_articles');
    }
}
