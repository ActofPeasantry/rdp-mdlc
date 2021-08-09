<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array('name' => 'admin' ));
        DB::table('roles')->insert(array('name' => 'dosen' ));
        DB::table('roles')->insert(array('name' => 'mahasiswa'));
    }
}
