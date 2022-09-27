<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'danjingna';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kie nggo rollback karo migrate tuli, nganjingna data seeder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:refresh');
        $this->call('db:seed');
    }
}
