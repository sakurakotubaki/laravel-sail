<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // personsテーブルにデータを挿入
        DB::table('persons')->insert([
            'name' => 'Taro',
            'email' => 'taro@co.jp',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('persons')->insert([
            'name' => 'Hanako',
            'email' => 'hoge@co.jp',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
