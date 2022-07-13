<?php

namespace App\Database\Seeds;

use App\Models\NewsCategory;
use CodeIgniter\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run()
    {
        (new NewsCategory())->insertBatch([
            [
                "name" => "Nasional",
                "slug" => "nasional",
            ],
            [
                "name" => "Korwil",
                "slug" => "korwil",
            ],
            [
                "name" => "Korda",
                "slug" => "korda",
            ],
        ]);
    }
}
