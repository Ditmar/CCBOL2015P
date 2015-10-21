<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //descomente esto para llenar datos a la bd
        $this->call('UserTableSeeder');
        $this->call('PostTableSeeeder');
        $this->call('TiemposSeeder');
        //$this->call('FeedbackTableSeeder');

        Model::reguard();
    }
}
