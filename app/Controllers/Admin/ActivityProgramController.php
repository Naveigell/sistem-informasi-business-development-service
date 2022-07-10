<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityProgram;

class ActivityProgramController extends BaseController
{
    public function index()
    {
        $programs = (new ActivityProgram())->findAll();

        return view('admin/pages/activity_program/index', compact('programs'));
    }

    public function create()
    {
        return view('admin/pages/activity_program/form');
    }

    public function store()
    {
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new ActivityProgram())->insert($this->request->getVar());

        return redirect()->route('admin.activity-programs.index')->with('success', 'Program Kegiatan berhasil ditambah');
    }

    public function edit($programId) {
        $program = (new ActivityProgram())->where('id', $programId)->first();

        return view('admin/pages/activity_program/form', compact('program'));
    }

    public function update($programId)
    {
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new ActivityProgram())->update($programId, $this->request->getVar());

        return redirect()->route('admin.activity-programs.index')->with('success', 'Program Kegiatan berhasil diubah');
    }

    public function destroy($programId)
    {
        (new ActivityProgram())->delete($programId);

        return redirect()->route('admin.activity-programs.index')->with('success', 'Program Kegiatan berhasil dihapus');
    }

    private function validator()
    {
        $validator = \Config\Services::validation();
        $validator->setRules([
            "title" => [
                "rules" => "required",
            ],
            "content" => [
                "rules" => "required",
            ],
        ]);

        return $validator;
    }
}
