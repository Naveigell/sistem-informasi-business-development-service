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
                "region"   => "Sumatera Barat",
                "leader"   => "Bapak Ketuaaa",
                "phone"    => null,
            ],
            [
                "region"   => "Sumatera Utara",
                "leader"   => null,
                "phone"    => null,
            ],
            [
                "region"   => "Sumatera Selatan",
                "leader"   => null,
                "phone"    => null,
            ],
            [
                "region"   => "Jakarta Barat",
                "leader"   => null,
                "phone"    => "029912834",
            ],
        ]);
    }
}
