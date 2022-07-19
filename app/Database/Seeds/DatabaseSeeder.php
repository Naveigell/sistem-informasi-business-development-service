<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Database;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $seeder = Database::seeder();
        $seeder->call('UsersSeeder');
        $seeder->call('NewsCategorySeeder');
        $seeder->call('NewsSeeder');
        $seeder->call('HistorySeeder');
        $seeder->call('VisionMissionSeeder');
        $seeder->call('RegionalCoordinatorSeeder');
        $seeder->call('NationalBoardSeeder');
        $seeder->call('ActivityProgramSeeder');
        $seeder->call('DiscussionForumSeeder');
    }
}
