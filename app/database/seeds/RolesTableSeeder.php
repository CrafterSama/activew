<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class RolesTableSeeder extends Seeder {
    public function run(){
        Roles::create(array(
            'role_name' => 'Administrador'
        ));
    }
}