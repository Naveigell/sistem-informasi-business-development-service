<?php

namespace App\Models;

use CodeIgniter\Model;

class News extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['category_id', 'thumbnail', 'slug', 'title', 'description', 'created_at'];
}
