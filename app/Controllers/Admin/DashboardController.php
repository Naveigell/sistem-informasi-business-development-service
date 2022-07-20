<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityProgram;
use App\Models\DiscussionForum;
use App\Models\News;
use App\Models\NewsCategory;
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

        $totalActivities  = count(
            (new ActivityProgram())->findAll()
        );

        $totalNews        = count(
            (new News())->findAll()
        );

        $totalNewsCategories = count(
            (new NewsCategory())->findAll()
        );

        return view('admin/pages/dashboard/index', compact('totalConsultants', 'totalClients', 'totalForums', 'totalActivities', 'totalNews', 'totalNewsCategories'));
    }
}
