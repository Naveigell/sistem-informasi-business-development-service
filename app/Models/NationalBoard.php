<?php

namespace App\Models;

use CodeIgniter\Model;

class NationalBoard extends Model
{
    protected $table = 'national_boards';

    protected $allowedFields = ['content'];
}
