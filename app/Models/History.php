<?php

namespace App\Models;

use CodeIgniter\Model;

class History extends Model
{
    protected $table = 'histories';

    protected $allowedFields = ['content'];
}
