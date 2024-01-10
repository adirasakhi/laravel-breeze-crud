<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class pegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');


    	for($i = 1; $i <= 10; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pegawais')->insert([
    			'nip' => $faker->nik,
    			'nama_pegawai' => $faker->name,
    			'masa_kerja' => $faker->numberBetween(1,10),
                'jenis_kelamin' => $faker->randomElement(['pria' ,'wanita']),
    			'alamat' => $faker->address
    		]);

    	}
    }
}
