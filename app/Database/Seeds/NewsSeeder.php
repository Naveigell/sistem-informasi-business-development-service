<?php

namespace App\Database\Seeds;

use App\Models\News;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_id' => 1,
                'thumbnail' => '',
                'title' => 'News 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla tincidunt enim, nec porttitor mauris volutpat vitae. Vestibulum metus lectus, aliquet venenatis hendrerit et, gravida in enim. Fusce dictum ipsum a nisi tristique elementum. Sed tempor vulputate tempor. Proin malesuada nibh augue, at sodales sapien iaculis et. Nunc imperdiet in sapien in faucibus. Sed interdum dolor id venenatis laoreet. Praesent sed tristique ante. Curabitur commodo est odio, non commodo magna posuere eu. Nulla quis diam blandit quam vehicula lobortis. Aliquam nec risus elementum, porta libero quis, maximus eros. Mauris egestas rhoncus nunc, quis viverra felis dictum vitae. Fusce luctus placerat purus sit amet commodo. Fusce vulputate urna arcu, sed scelerisque arcu vehicula ac.',
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'category_id' => 1,
                'thumbnail' => '',
                'title' => 'News 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla tincidunt enim, nec porttitor mauris volutpat vitae. Vestibulum metus lectus, aliquet venenatis hendrerit et, gravida in enim. Fusce dictum ipsum a nisi tristique elementum. Sed tempor vulputate tempor. Proin malesuada nibh augue, at sodales sapien iaculis et. Nunc imperdiet in sapien in faucibus. Sed interdum dolor id venenatis laoreet. Praesent sed tristique ante. Curabitur commodo est odio, non commodo magna posuere eu. Nulla quis diam blandit quam vehicula lobortis. Aliquam nec risus elementum, porta libero quis, maximus eros. Mauris egestas rhoncus nunc, quis viverra felis dictum vitae. Fusce luctus placerat purus sit amet commodo. Fusce vulputate urna arcu, sed scelerisque arcu vehicula ac.',
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'category_id' => 1,
                'thumbnail' => '',
                'title' => 'News 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fringilla tincidunt enim, nec porttitor mauris volutpat vitae. Vestibulum metus lectus, aliquet venenatis hendrerit et, gravida in enim. Fusce dictum ipsum a nisi tristique elementum. Sed tempor vulputate tempor. Proin malesuada nibh augue, at sodales sapien iaculis et. Nunc imperdiet in sapien in faucibus. Sed interdum dolor id venenatis laoreet. Praesent sed tristique ante. Curabitur commodo est odio, non commodo magna posuere eu. Nulla quis diam blandit quam vehicula lobortis. Aliquam nec risus elementum, porta libero quis, maximus eros. Mauris egestas rhoncus nunc, quis viverra felis dictum vitae. Fusce luctus placerat purus sit amet commodo. Fusce vulputate urna arcu, sed scelerisque arcu vehicula ac.',
                'created_at' => Time::now()->toDateTimeString(),
            ],
        ];

        (new News())->insertBatch($data);
    }
}
