<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Composer;

class InstallJumia extends Command
{
    protected $signature = 'install:jumia';
    protected $description = 'Install Jumia';

    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }


    public function handle()
    {
        $this->composer->dumpAutoloads();
        $this->composer->dumpOptimized();
        Artisan::call('cache:clear');
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed --class=UserSeeder');
        Artisan::call('db:seed --class=PermissionSeed');
        Artisan::call('db:seed --class=RoleSeeder');
        Artisan::call('db:seed --class=StationSeeder');
        Artisan::call('cache:clear');
        echo "Jumia App is installed successfully Please run 'php artisan serve' to show project";
    }
}
