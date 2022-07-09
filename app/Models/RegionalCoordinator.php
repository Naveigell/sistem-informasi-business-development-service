<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionalCoordinator extends Model
{
    protected $table = 'regional_coordinators';

    protected $allowedFields = ['thumbnail', 'region', 'leader', 'address', 'phone'];
}
