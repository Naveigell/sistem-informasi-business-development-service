<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $allowedFields = ['name', 'slug'];
}
