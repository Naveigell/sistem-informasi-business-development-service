<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityProgram extends Model
{
    protected $table = 'activity_programs';

    protected $allowedFields = ['slug', 'title', 'content'];
}
