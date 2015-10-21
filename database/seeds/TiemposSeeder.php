<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Tiempo;

class TiemposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tiempo::create(
      [
        'dia'=>'24',
        'mes'=>'11',
        'anio' => '2015',
        'hora'=>'00',
        'minutos'=>'00',
        'segundos'=>'00'
      ]
      );
    }
}
