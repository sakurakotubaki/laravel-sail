<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;// 追加

class HogeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ダミーのデータをDBに５件追加
        DB::table('hoge')->insert([
            'name' => 'Jboy',
            'age' => 35,
            'birthday' => '2000-01-01',
        ]);
        DB::table('hoge')->insert([
            'name' => 'icchy',
            'age' => 28,
            'birthday' => '2000-01-02',
        ]);
        DB::table('hoge')->insert([
            'name' => 'yuiyui',
            'age' => 30,
            'birthday' => '2000-01-03',
        ]);
        DB::table('hoge')->insert([
            'name' => 'taisei',
            'age' => 25,
            'birthday' => '2000-01-04',
        ]);
        DB::table('hoge')->insert([
            'name' => 'minnminn',
            'age' => 23,
            'birthday' => '2000-01-05',
        ]);
    }
}
