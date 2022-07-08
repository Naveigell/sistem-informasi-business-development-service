<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\History;

class HistoryController extends BaseController
{
    public function edit($historyId)
    {
        $history = (new History())->where('id', $historyId)->first();

        return view('admin/pages/history/form', compact('history'));
    }

    public function update($historyId)
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

        (new History())->update($historyId, $this->request->getVar());

        return redirect()->route('admin.histories.edit', [$historyId])->withInput()->with('success', 'Sejarah berhasil diubah');
    }
}
