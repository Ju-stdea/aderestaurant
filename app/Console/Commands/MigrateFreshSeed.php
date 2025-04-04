<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateFreshSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fresh-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrate:fresh and then seed the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}