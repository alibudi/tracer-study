<?php

namespace Database\Seeders;

use App\Models\Groups;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Groups;
        $user->name = "Admin";
        $user->save();
    }
}
