<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    const ROLE_ADMIN      = 'admin';
    const ROLE_CLIENT     = 'client';
    const ROLE_CONSULTANT = 'consultant';

    protected $table = 'users';

    protected $allowedFields = [
        'name', 'username', 'email', 'password', 'phone', 'address', 'role',
    ];
}
