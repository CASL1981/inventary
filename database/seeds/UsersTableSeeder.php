<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
				'cc'        => '7383633,',
				'firstname' => 'Carlos',
				'lastname'  => 'Sibaja',
				'role'      => 'admin',
				'email'     => 'carlos@yahoo.es',
				'area'      => 'administracion',
				'nick'      => 'CASL',
                'avatar'    => 'avatar-male.png',
				'password'  => bcrypt('admin')
            ]);

        factory(App\User::class, 20)->create();
    }
}
