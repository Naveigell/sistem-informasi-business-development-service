<?php

namespace App\Models;

use CodeIgniter\Model;

class VisionMission extends Model
{
    protected $table = 'vision_missions';

    protected $allowedFields = ['content'];
}
