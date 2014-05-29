<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username' => 'craftersama',
            'email' => 'jolivero.03@gmail.com',
            'full_name'=> 'Julmer Olivero',
            'password' => Hash::make('admin'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'role_id' => 1
        ));
    }
}