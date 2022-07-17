<?php

namespace App\Controllers\Api\Member;

use App\Controllers\BaseController;
use App\Models\Chat;

class ChatController extends BaseController
{
    public function show($userId)
    {
        $chats = (new Chat())->whereIn('sender_id', [session()->get('user')->id, $userId])
                             ->WhereIn('receiver_id', [session()->get('user')->id, $userId])
                             ->findAll();

        $chats = array_map(function ($item) {
            $item['created_at_formatted'] = date('d F Y - H:i', strtotime($item['created_at']));

            return $item;
        }, $chats);

        echo json_encode($chats, JSON_OBJECT_AS_ARRAY);
    }
}
