<?php

namespace App\Database\Seeds;

use App\Models\DiscussionForum;
use App\Models\DiscussionForumChat;
use App\Models\User;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DiscussionForumSeeder extends Seeder
{
    public function run()
    {
        $forums = [
            [
                "forum_name" => "IPA",
            ],
            [
                "forum_name" => "IPS",
            ],
            [
                "forum_name" => "Kewarganegaraan",
            ],
            [
                "forum_name" => "Biologi",
            ],
            [
                "forum_name" => "Matematika",
            ],
        ];

        $users = (new User())->whereIn('role', [User::ROLE_CLIENT, User::ROLE_CONSULTANT])->findAll();

        foreach ($forums as $data) {
            $forum = (new DiscussionForum());
            $forum->insert($data);

            $forumId = $forum->getInsertID();

            for ($i = 0; $i < rand(5, 10); $i++) {

                $contents = [
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at erat ted",
                    ", volutpat vehicula sem. Nunc bibendum justo orci, sit amet ",
                    "sodales nibh convallis vel. Phasellus aliquam nisl risus, in aliq",
                    "uam eros sodales ac. Sed laoreet neque nec iaculis sce",
                    "rutrum, ornare enim non, lobortis dui. Morbi efficitur ul",
                    "ricies feugiat. Duis libero mauris, sodales in felis s",
                    "lerisque. Fusce neque neque, scelerisque ut eros sit ",
                    "amet, sodales bibendum enim. Etiam feugiat malesuada sem. Eti",
                    "am rutrum leo in est rhoncus, egestas lobortis mauris feugiat.",
                ];

                (new DiscussionForumChat())->insert([
                    "forum_id"   => $forumId,
                    "sender_id"  => $users[array_rand($users)]['id'],
                    "content"    => $contents[array_rand($contents)],
                    "created_at" => Time::now()->toDateTimeString(),
                ]);
            }
        }
    }
}
