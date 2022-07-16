<?php

namespace App\Models;

use CodeIgniter\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $allowedFields = ['sender_id', 'receiver_id', 'content', 'created_at'];
}
