<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\ActivityProgram;

class ActivityProgramController extends BaseController
{
    public function detail($slug)
    {
        $activity = (new ActivityProgram())->where('slug', $slug)->first();

        return view('member/pages/activity_program/index', compact('activity'));
    }
}
