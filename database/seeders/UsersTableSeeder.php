<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->nis = "123456789";
        $user->alamat = "desa kramat";
        $user->agama = "islam";
        $user->no_hp = "0832889898";
        $user->jenis_kelamin = "Laki-laki";
        $user->password = bcrypt('12345678'); 
        $user->save();
    }
}
