<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NationalBoard;

class NationalBoardController extends BaseController
{
    public function edit($nationalId)
    {
        $nationalBoard = (new NationalBoard())->where('id', $nationalId)->first();

        return view('admin/pages/national_board/form', compact('nationalBoard'));
    }

    public function update($nationalId)
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

        (new NationalBoard())->update($nationalId, $this->request->getVar());

        return redirect()->route('admin.national-boards.edit', [$nationalId])->withInput()->with('success', 'Pengurus National berhasil diubah');
    }
}
