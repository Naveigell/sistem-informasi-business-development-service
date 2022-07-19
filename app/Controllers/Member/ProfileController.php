<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\User;

class ProfileController extends BaseController
{
    public function index()
    {
        $consultants = (new User())->where('role', [User::ROLE_CONSULTANT])->findAll();
        $clients     = (new User())->where('role', [User::ROLE_CLIENT])->findAll();

        return view('member/pages/profile/index', compact('consultants', 'clients'));
    }
}
