<?php

namespace Database\Seeders;

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
		User::updateOrCreate(['id' => 1], ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => password_hash('password', PASSWORD_BCRYPT), "is_admin" => 1]);
	}
}
