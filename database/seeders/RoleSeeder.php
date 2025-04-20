<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => Str::uuid()->toString(),
                'role_name' => 'Superadmin',
            ],
            [
                'id' => Str::uuid()->toString(),
                'role_name' => 'Member',
            ],
        ]);
    }
}
