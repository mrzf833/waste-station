<?php

namespace Database\Seeders;

use App\Models\ProfileUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('role', 'admin')->firstOrFail()->id;
        User::create([
            'role_id' => $adminRole,
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('adminapp'),
            'status' => '0'
        ]);

        $employeeRole = Role::where('role', 'employee')->firstOrFail()->id;
        $employeUser = User::create([
            'role_id' => $employeeRole,
            'username' => 'employee',
            'name' => 'employee',
            'email' => 'employee@app.com',
            'password' => bcrypt('employeeapp'),
            'status' => '0'
        ]);

        ProfileUser::create([
            'user_id' => $employeUser->id,
            'address' => 'bandung',
            'telephone' => '0822735234',
            'point' => 0
        ]);

        $clientRole = Role::where('role', 'client')->firstOrFail()->id;
        $clientUser1 = User::create([
            'role_id' => $clientRole,
            'username' => 'client1',
            'name' => 'client1',
            'email' => 'client1@app.com',
            'password' => bcrypt('clientapp'),
            'status' => '0'
        ]);

        ProfileUser::create([
            'user_id' => $clientUser1->id,
            'address' => 'bandung',
            'telephone' => '08129374812',
            'point' => 0
        ]);

        $clientUser2 = User::create([
            'role_id' => $clientRole,
            'username' => 'client2',
            'name' => 'client2',
            'email' => 'client2@app.com',
            'password' => bcrypt('clientapp'),
            'status' => '0'
        ]);

        ProfileUser::create([
            'user_id' => $clientUser2->id,
            'address' => 'bandung',
            'telephone' => '08123112',
            'point' => 0
        ]);

        $clientUser3 = User::create([
            'role_id' => $clientRole,
            'username' => 'client3',
            'name' => 'client3',
            'email' => 'client3@app.com',
            'password' => bcrypt('clientapp'),
            'status' => '0'
        ]);

        ProfileUser::create([
            'user_id' => $clientUser3->id,
            'address' => 'bandung',
            'telephone' => '01231213',
            'point' => 0
        ]);
    }
}
