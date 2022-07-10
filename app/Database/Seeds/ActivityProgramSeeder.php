<?php

namespace App\Database\Seeds;

use App\Models\ActivityProgram;
use CodeIgniter\Database\Seeder;

class ActivityProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                "title" => "PIPA Pembiayaan",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ligula mi. Pellentesque posuere bibendum sem, ut ultricies arcu. Donec lacinia ipsum mattis, feugiat risus interdum, molestie metus. Nunc aliquet tortor ut lectus elementum egestas. Vestibulum finibus, felis in mattis malesuada, massa ligula mollis dolor, eget ultricies mauris urna sed quam. Nunc pharetra ante et odio vehicula, quis facilisis arcu efficitur. Phasellus sagittis sapien at sapien fermentum, non mollis sapien gravida. Quisque purus mi, scelerisque vel leo in, laoreet ultricies augue. Praesent finibus nisi quis volutpat dapibus. Nam rutrum, nisi eu interdum euismod, magna diam efficitur urna, ut ultricies nisi tortor nec nibh. Cras aliquam risus eget libero blandit facilisis. Morbi at erat ornare, hendrerit lorem at, fermentum magna. Donec condimentum fringilla dolor.

Quisque sed nibh sit amet nibh ullamcorper congue. Nam semper quam pellentesque, tempor ipsum et, porta nunc. Suspendisse potenti. Proin viverra eu tortor sed euismod. Fusce auctor nunc odio, sit amet sollicitudin dui iaculis nec. Suspendisse non ligula lacus. Cras a sapien mauris. Aliquam erat volutpat.

Nulla nec tortor vitae urna fringilla sodales non vitae odio. Nam facilisis convallis leo in imperdiet. Suspendisse vitae mollis nibh. Cras gravida blandit augue ut fermentum. Maecenas fermentum nibh sit amet mi bibendum, sodales pretium tellus dapibus. Phasellus sed erat felis. Fusce in condimentum sapien. Aenean risus eros, sagittis vitae magna non, malesuada porta ante. Curabitur nec laoreet arcu. Morbi hendrerit nibh sagittis nulla facilisis, ut sodales risus laoreet. In eu rutrum nulla.

Aenean ligula urna, condimentum non viverra et, placerat quis mauris. Integer at orci non justo maximus mollis. Nullam ac fermentum velit, vel luctus nisi. Suspendisse ornare auctor felis, vitae facilisis nisl auctor ac. Nullam feugiat libero felis, in scelerisque sapien feugiat eu. Etiam cursus fermentum tellus, ut pharetra nulla malesuada nec. Aliquam scelerisque tristique felis, at lobortis arcu pretium a.

Aliquam vehicula congue nulla, vel sollicitudin ante commodo fermentum. Ut sed mollis dolor, a lacinia metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi bibendum enim dui, eget dapibus ex porta nec. In ac arcu vel sapien aliquam fringilla vitae sed purus. Quisque et mi ut massa blandit pellentesque. Integer pulvinar pretium turpis, eu venenatis nisl tristique sit amet. Proin eleifend dignissim quam non molestie. Nam egestas dolor sed nibh suscipit cursus. Etiam eget mattis sapien. Phasellus dictum tempor dictum. Fusce egestas nisl at suscipit suscipit. Suspendisse tempor tellus eros, ut sodales est bibendum id. Vivamus consectetur, magna quis eleifend commodo, quam erat tempus dui, quis dictum tellus ex id mi. Aenean consectetur dignissim dui ac volutpat.",
            ],
            [
                "title" => "KLINIK PEMULIHAN BISNIS",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam tortor ut auctor bibendum. Vestibulum tempus erat vitae egestas blandit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer a velit nec nulla ultricies mattis et hendrerit nibh. Pellentesque velit ligula, venenatis ut ultrices sed, volutpat vitae purus. Pellentesque finibus pellentesque leo, sed mollis justo faucibus quis. Cras laoreet faucibus sem. Sed eu eros vel urna porta viverra ac quis est. Vivamus non ipsum auctor, fringilla tellus id, vulputate arcu.

Fusce vehicula consectetur lacus at pharetra. Nulla facilisi. Nullam vitae neque a tellus interdum ullamcorper in quis nunc. Sed lacinia quis nunc quis scelerisque. Curabitur interdum velit sit amet nunc placerat scelerisque. Vivamus a lacinia nulla. Pellentesque nec nunc sit amet diam lacinia ultricies. Cras iaculis tristique nulla eget euismod. Quisque sit amet enim non justo semper rhoncus non quis urna. Suspendisse potenti. Pellentesque eleifend iaculis vehicula.

In tincidunt est metus, eget viverra leo vehicula quis. Phasellus pellentesque euismod dolor ut dignissim. Morbi lorem nulla, finibus rhoncus orci vel, ultrices malesuada augue. In viverra quam tempus orci commodo, a viverra lectus efficitur. Donec metus ligula, euismod ut orci nec, consectetur gravida leo. Praesent id lorem imperdiet, accumsan diam ac, viverra ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec vestibulum in justo eget interdum. Fusce a purus in lacus hendrerit lacinia. Phasellus finibus scelerisque metus eu vulputate. Cras lacinia vehicula porta. Etiam aliquam vulputate eros. Vivamus eros arcu, faucibus at ex et, fringilla vulputate tortor.

Vestibulum euismod quam eu nunc condimentum, non efficitur odio laoreet. Duis ut mauris eget augue pharetra aliquam. Maecenas tristique elementum quam non pulvinar. In sed orci elit. Vivamus commodo nec quam rhoncus dictum. Maecenas convallis elit in efficitur laoreet. Curabitur orci orci, dapibus id maximus vel, tristique non arcu. Suspendisse pharetra nulla tincidunt, cursus urna in, malesuada eros. In consectetur mi dolor, vitae mollis mi sollicitudin ac. Nullam quis placerat lorem, eget vestibulum ipsum. Nullam sed nibh non dolor fringilla maximus. Donec nec vulputate dolor. Nam faucibus urna non nulla dignissim consequat. Quisque ultrices finibus enim, vel placerat neque sollicitudin vitae.

Nam non luctus risus. In at neque mollis, volutpat turpis non, gravida purus. Ut pulvinar augue ut ipsum sollicitudin, id lacinia orci ultricies. Suspendisse suscipit mauris in consequat efficitur. Maecenas lobortis bibendum lectus, eu egestas ex luctus quis. Nullam lacinia et leo eget consectetur. Donec sodales, felis et vulputate vehicula, mauris magna aliquet velit, eget hendrerit tellus metus ac nulla. Nunc tincidunt ut turpis convallis eleifend. Donec magna neque, faucibus vitae volutpat quis, pretium eu est. Integer dignissim tortor vitae lorem scelerisque, at finibus elit eleifend. Aliquam tristique arcu gravida est tincidunt, et dapibus dolor interdum."
            ]
        ];

        (new ActivityProgram())->insertBatch($programs);
    }
}
