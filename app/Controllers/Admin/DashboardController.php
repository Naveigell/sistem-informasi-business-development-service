<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DiscussionForum;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $totalConsultants = count(
            (new User())->where('role', User::ROLE_CONSULTANT)->findAll()
        );

        $totalClients     = count(
            (new User())->where('role', User::ROLE_CLIENT)->findAll()
        );

        $totalForums      = count(
            (new DiscussionForum())->findAll()
        );

        return view('admin/pages/dashboard/index', compact('totalConsultants', 'totalClients', 'totalForums'));
    }
}
