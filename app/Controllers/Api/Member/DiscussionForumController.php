<?php

namespace App\Controllers\Api\Member;

use App\Controllers\BaseController;
use App\Models\DiscussionForumChat;
use App\Models\User;

class DiscussionForumController extends BaseController
{
    public function show($forumId)
    {
        $chats = (new DiscussionForumChat())->where('forum_id', $forumId)
                                            ->findAll();

        $chats = array_map(function ($item) {
            $item['created_at_formatted'] = date('d F Y - H:i', strtotime($item['created_at']));
            $item['user']                 = (new User())->where('id', $item['sender_id'])->first();
            $item['user']['avatar_url']   = $item['user']['avatar'] ? base_url('/uploads/images/users/' . $item['user']['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png';

            return $item;
        }, $chats);

        echo json_encode($chats, JSON_OBJECT_AS_ARRAY);
    }
}
