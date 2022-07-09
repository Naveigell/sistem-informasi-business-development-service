<?php

namespace App\Database\Seeds;

use App\Models\RegionalCoordinator;
use CodeIgniter\Database\Seeder;

class RegionalCoordinatorSeeder extends Seeder
{
    public function run()
    {
        (new RegionalCoordinator())->insertBatch([
            [
                "regional" => "Sumatera Barat",
            ],
            [
                "regional" => "Sumatera Utara",
            ],
            [
                "regional" => "Sumatera Selatan",
            ],
            [
                "regional" => "Jakarta Barat",
            ],
        ]);
    }
}
