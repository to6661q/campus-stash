<?php

use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bankData')->insert([
            [
                'nama' => "Data Pertama",
                'keluhan' => "Kesatu",
            ],
            [
                'nama' => "Data Kedua",
                'keluhan' => "Kedua",
            ],
            [
                'nama' => "Data Ketiga",
                'keluhan' => "Ketiga",
            ]
        ]);
    }
}
