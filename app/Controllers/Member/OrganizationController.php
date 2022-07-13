<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\History;
use App\Models\NationalBoard;
use App\Models\RegionalCoordinator;
use App\Models\VisionMission;

class OrganizationController extends BaseController
{
    public function history()
    {
        $history = (new History())->first();

        return view('member/pages/organization/history', compact('history'));
    }

    public function visionMission()
    {
        $visionMission = (new VisionMission())->first();

        return view('member/pages/organization/vision_mission', compact('visionMission'));
    }

    public function nationalBoard()
    {
        $nationalBoard = (new NationalBoard())->first();

        return view('member/pages/organization/national_board', compact('nationalBoard'));
    }

    public function regionalCoordinator()
    {
        $coordinators = (new RegionalCoordinator())->findAll();

        return view('member/pages/organization/regional_coordinator', compact('coordinators'));
    }
}
