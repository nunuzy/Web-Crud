<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'judul'=>'Filosopi Teras',
            'pengarang'=>'Opi',
            'penerbit'=>'Widjaja',
            'persediaan'=>'60',
            'gambar'=>'-',
        ]);
    }
}
