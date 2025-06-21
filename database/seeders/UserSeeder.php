<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Traits\HasRole;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            ['name' => 'ADMINISTRADOR', 'email' => 'admin@email.com','password' => bcrypt('21246813'), 'nivel_id' =>'1', 'estado_id' => '25', 'area_id' => '11', 'is_admin' => true, 'is_active' => true],
            ['name' => 'AGAPITO', 'email' => 'kelvis@email.com','password' => bcrypt('22989056'), 'nivel_id' => '1', 'estado_id' => '25', 'area_id' => '2', 'is_admin' => false, 'is_active' => true],
            ['name' => 'Organización', 'email' => 'utopiamirandina@gmail.com', 'password' => bcrypt('utopiamirandina'), 'nivel_id' => '1', 'estado_id' => '25', 'area_id' => '11', 'is_admin' => false, 'is_active' => true],
            ['name' => 'amazonas', 'email' => 'amazonas@email.com','password' => bcrypt('amazonas'), 'nivel_id' => '2', 'estado_id' => '22', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'anzoategui', 'email' => 'anzoategui@email.com','password' => bcrypt('anzoategui'), 'nivel_id' => '2', 'estado_id' => '2', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'apure', 'email' => 'apure@email.com','password' => bcrypt('apure'), 'nivel_id' => '2', 'estado_id' => '3', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'aragua', 'email' => 'aragua@email.com','password' => bcrypt('aragua'), 'nivel_id' => '2', 'estado_id' => '4', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'barinas', 'email' => 'barinas@email.com','password' => bcrypt('barinas'), 'nivel_id' => '2', 'estado_id' => '5', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'bolivar', 'email' => 'bolivar@email.com','password' => bcrypt('bolivar'), 'nivel_id' => '2', 'estado_id' => '6', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'carabobo', 'email' => 'carabobo@email.com','password' => bcrypt('carabobo'), 'nivel_id' => '2', 'estado_id' => '7', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'cojedes', 'email' => 'cojedes@email.com','password' => bcrypt('cojedes'), 'nivel_id' => '2', 'estado_id' => '8', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'delta amacuro', 'email' => 'deltaamacuro@email.com','password' => bcrypt('deltaamacuro'), 'nivel_id' => '2', 'estado_id' => '23', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'caracas', 'email' => 'caracas@email.com','password' => bcrypt('caracas'), 'nivel_id' => '2', 'estado_id' => '1', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'falcon', 'email' => 'falcon@email.com','password' => bcrypt('falcon'), 'nivel_id' => '2', 'estado_id' => '9', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'guarico', 'email' => 'guarico@email.com','password' => bcrypt('guarico'), 'nivel_id' => '2', 'estado_id' => '10', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'la guaira', 'email' => 'laguaira@email.com','password' => bcrypt('laguaira'), 'nivel_id' => '2', 'estado_id' => '24', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'lara', 'email' => 'lara@email.com','password' => bcrypt('lara'), 'nivel_id' => '2', 'estado_id' => '11', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'merida', 'email' => 'merida@email.com','password' => bcrypt('merida'), 'nivel_id' => '2', 'estado_id' => '12', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'miranda', 'email' => 'miranda@email.com','password' => bcrypt('miranda'), 'nivel_id' => '2', 'estado_id' => '13', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'monagas', 'email' => 'monagas@email.com','password' => bcrypt('monagas'), 'nivel_id' => '2', 'estado_id' => '14', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'nueva esparta', 'email' => 'nuevaesparta@email.com','password' => bcrypt('nuevaesparta'), 'nivel_id' => '2', 'estado_id' => '15', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'portuguesa', 'email' => 'portuguesa@email.com','password' => bcrypt('portuguesa'), 'nivel_id' => '2', 'estado_id' => '16', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'sucre', 'email' => 'sucre@email.com','password' => bcrypt('sucre'), 'nivel_id' => '2', 'estado_id' => '17', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'tachira', 'email' => 'tachira@email.com','password' => bcrypt('tachira'), 'nivel_id' => '2', 'estado_id' => '18', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'trujillo', 'email' => 'trujillo@email.com','password' => bcrypt('trujillo'), 'nivel_id' => '2', 'estado_id' => '19', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'yaracuy', 'email' => 'yaracuy@email.com','password' => bcrypt('yaracuy'), 'nivel_id' => '2', 'estado_id' => '20', 'area_id' => '12', 'is_admin' => false, 'is_active' => true],
            ['name' => 'zulia', 'email' => 'zulia@email.com','password' => bcrypt('zulia'), 'nivel_id' => '2', 'estado_id' => '21', 'area_id' => '12', 'is_admin' => false, 'is_active' => true]
        ]);

        // $user = User::Where('email', '=', 'admin@email.com')->get();
        // $user->assignRole('Admin');
    }
}
