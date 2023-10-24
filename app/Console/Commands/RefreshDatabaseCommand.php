<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:refresh', [
            '--seed' => true,
        ]);
    }
}
