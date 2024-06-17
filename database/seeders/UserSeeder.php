<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(('users'))->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('roles')->insert([
            'name' => 'super-admin',
            'guard_name' => 'web'
        ]);
        DB::table('permissions')->insert([
            'name'=>'create-role',
            'guard_name' => 'web'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=> 1,
            'role_id'=>1
        ]);
        DB::table('model_has_roles')->insert([
            'role_id'=> 1,
            'model_type' => 'App\Models\User',
            'model_id'=>1
        ]);
    }
}
