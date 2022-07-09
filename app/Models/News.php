<?php

namespace App\Models;

use CodeIgniter\Model;

class News extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['thumbnail', 'title', 'description', 'created_at'];
}