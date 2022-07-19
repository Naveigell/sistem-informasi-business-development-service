<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscussionForumChat extends Model
{
    protected $table = 'discussion_forum_chats';

    protected $allowedFields = ['forum_id', 'sender_id', 'content', 'created_at'];
}
