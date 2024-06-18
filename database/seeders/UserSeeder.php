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


        $models = ['user', 'role', 'product'];

        $data = [];

        foreach ($models as $id => $model) {
            [
                $data[] = [
                    'id' => ($id * 5) + 1,
                    'name' => 'create-' . $model,
                    'guard_name' => 'web',
                    'type' => $model
                ],
                $data[] = [
                    'id' => ($id * 5) + 2,
                    'name' => 'view-' . $model,
                    'guard_name' => 'web',
                    'type' => $model
                ],
                $data[] = [
                    'id' => ($id * 5) + 3,
                    'name' => 'edit-' . $model,
                    'guard_name' => 'web',
                    'type' => $model
                ],
                $data[] = [
                    'id' => ($id * 5) + 4,
                    'name' => 'update-' . $model,
                    'guard_name' => 'web',
                    'type' => $model
                ],
                $data[] = [
                    'id' => ($id * 5) + 5,
                    'name' => 'delete-' . $model,
                    'guard_name' => 'web',
                    'type' => $model
                ]

            ];
        }

        DB::table('permissions')->insert($data);


        DB::table('role_has_permissions')->insert([

            [
                'permission_id' => 1,
                'role_id' => 1
            ]

        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1
        ]);
    }
}
