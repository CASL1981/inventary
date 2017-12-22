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
				'cc'        => '7383633',
				'firstname' => 'CARLOS',
				'lastname'  => 'SIBAJA',
				'role'      => 'admin',
				'email'     => 'contabilidad@coodescor.org.co',
				'area'      => 'administracion',
				'nick'      => 'CASL',
                'avatar'    => 'avatar-male.png',
				'password'  => bcrypt('Samuel1981')
            ]);

        factory(App\User::class)->create([
                'cc'        => '1067891523',
                'firstname' => 'TANIA',
                'lastname'  => 'MARTINEZ',
                'role'      => 'edit',
                'email'     => 'administrativo@coodescor.org.co',
                'area'      => 'administracion',
                'nick'      => 'TANIA',
                'avatar'    => 'avatar-female.png',
                'password'  => bcrypt('123456')
            ]);

        factory(App\User::class)->create([
                'cc'        => '1067912234',
                'firstname' => 'ESTEFANIA',
                'lastname'  => 'BOLAÑO',
                'role'      => 'normal',
                'email'     => 'aux_administrativa2@coodescor.org.co',
                'area'      => 'administracion',
                'nick'      => 'ESTEFANIA',
                'avatar'    => 'avatar-female2.png',
                'password'  => bcrypt('123456')
            ]);

        //factory(App\User::class, 20)->create();
    }
}
