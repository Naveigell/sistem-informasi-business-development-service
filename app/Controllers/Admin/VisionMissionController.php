<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VisionMission;

class VisionMissionController extends BaseController
{
    public function edit($visionMissionId)
    {
        $visionMission = (new VisionMission())->where('id', $visionMissionId)->first();

        return view('admin/pages/vision_mission/form', compact('visionMission'));
    }

    public function update($visionMission)
    {
        $validator = \Config\Services::validation();
        $validator->setRules([
            "content" => [
                "rules" => "required",
            ]
        ]);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new VisionMission())->update($visionMission, $this->request->getVar());

        return redirect()->route('admin.vision-missions.edit', [$visionMission])->withInput()->with('success', 'Visi & misi berhasil diubah');
    }
}
