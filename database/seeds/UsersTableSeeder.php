<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserTableSeeder extends Seeder{

	public function run(){
		User::create(
			[
				'username'=>'Libre',
				'email'=>'Libre@gmail.com',
				'nombres' => 'libre',
				'apellidos'=>'registro',
				'password'=>\Hash::make('CCbol2015UniversidadAutonomaTomasFrias'),
				'rol' => 'administrador'
			]
			);
		User::create(
			[
				'username'=>'Jose123',
				'email'=>'jose123@gmail.com',
				'nombres' => 'jose martin',
				'apellidos'=>'lopez sans',
				'password'=>\Hash::make('123456'),
				'rol' => 'administrador'
			]
			);
		User::create(
			[
				'username'=>'David123',
				'email'=>'David123@gmail.com',
				'nombres' => 'choque gutierres',
				'apellidos'=>'sanches luz',
				'password'=>\Hash::make('123456'),
				'rol' => 'administrador'
			]
			);
	}
}
