<?php

namespace App\Database\Seeds;

use App\Models\History;
use CodeIgniter\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run()
    {
        $history = [
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id libero quam. Ut suscipit lobortis aliquam. Pellentesque vehicula vel risus non commodo. Quisque commodo dui at sagittis vestibulum. Donec ac dolor urna. Praesent tempus justo et lorem cursus bibendum. Donec egestas efficitur laoreet. Pellentesque vel condimentum mi. Cras euismod est vel feugiat eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed quam diam.

                            Phasellus dignissim sapien interdum nulla porttitor mattis. Ut nulla tellus, porttitor in iaculis viverra, ornare quis erat. Praesent pretium lorem eget faucibus cursus. Nullam tristique magna tellus, a maximus sem tincidunt ut. Proin sed pellentesque ex. Sed nec pulvinar lacus. Phasellus ullamcorper blandit diam, ut pretium eros consectetur non.
                            
                            In faucibus varius tempus. Etiam semper diam non erat accumsan commodo. Aenean id suscipit risus. Donec tempor sapien eu orci viverra dapibus. Ut erat metus, lobortis non placerat vitae, tempor sit amet sapien. Fusce bibendum quam diam, quis feugiat ipsum molestie vel. Integer eu ultrices nisi, ut sagittis ligula. Mauris nec felis placerat, ullamcorper diam ut, aliquam ante.",
        ];

        (new History())->insert($history);
    }
}
