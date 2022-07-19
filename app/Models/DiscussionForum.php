<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscussionForum extends Model
{
    protected $table = 'discussion_forums';

    protected $allowedFields = ['forum_name', 'thumbnail'];
}
