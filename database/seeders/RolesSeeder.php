<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'user', 'guard_name' => 'web'],
            ['name' => 'admin', 'guard_name' => 'web'],
        ];

        foreach ($roles as $key => $role) {

            $callStatusRow = Role::where('name', $role['name'])->first();

            if (!$callStatusRow) {
                $callStatusModel = new Role;
                $callStatusModel->name =  $role['name'];
                $callStatusModel->guard_name = $role['guard_name'];
                $callStatusModel->save();
            }
        }
    }
}
