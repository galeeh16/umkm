<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = bcrypt('Secret12345');
        $now = date('Y-m-d H:i:s');

        // superadmin role
        $a = DB::table('roles')->where('role_name', 'Superadmin')->first();
        
        // admin
        User::create([
            'id' => Str::uuid()->toString(),
            'name' => 'Superadmin',
            'email' => 'admin@example.com',
            'password' => $password,
            'role_id' => $a->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // member role
        $m = DB::table('roles')->where('role_name', 'Member')->first();

        // member example
        $id = User::insertGetId([
            'id' => Str::uuid()->toString(),
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => $password,
            'role_id' => $m->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // create member profile example
        Profile::create([
            'id' => Str::uuid()->toString(),
            'user_id' => $id,
            'address' => 'Jalan Pondok Pinang VI',
            'phone_number' => '081323332255',
        ]);

    }
}
