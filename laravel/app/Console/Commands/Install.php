<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

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
        Artisan::call('migrate -n --force');
        $this->info('Migrate sikerült!');
        Artisan::call('db:seed');
        $this->info('Seedeles sikerült!');
        return Command::SUCCESS;
    }
}
