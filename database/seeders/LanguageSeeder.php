<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create( [
            'id'=>1,
            'name'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        Language::create( [
            'id'=>2,
            'name'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        Language::create( [
            'id'=>3,
            'name'=>'hy',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

    }
}
