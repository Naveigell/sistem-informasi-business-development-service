<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class ConsultantController extends BaseController
{
    public function index()
    {
        $consultants = (new User())->where('role', User::ROLE_CONSULTANT)->findAll();

        return view('admin/pages/consultant/index', compact('consultants'));
    }

    public function create()
    {
        return view('admin/pages/consultant/form');
    }

    public function store()
    {
        $validator = $this->validator(true);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new User())->insert(array_merge($this->request->getVar(), [
            "role"     => User::ROLE_CONSULTANT,
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]));

        return redirect()->route('admin.consultants.index')->withInput()->with('success', 'Konsultan berhasil di tambah');
    }

    public function edit($consultantId)
    {
        $consultant = (new User())->where('id', $consultantId)->where('role', User::ROLE_CONSULTANT)->first();

        return view('admin/pages/consultant/form', compact('consultant'));
    }

    public function update($consultantId)
    {
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new User())->update($consultantId, $this->request->getVar());

        return redirect()->route('admin.consultants.index')->withInput()->with('success', 'Konsultan berhasil di ubah');
    }

    public function destroy($consultantId)
    {
        (new User())->delete($consultantId);

        return redirect()->route('admin.consultants.index')->withInput()->with('success', 'Konsultan berhasil di hapus');
    }

    private function validator($validateWithPassword = false)
    {
        $rules = [
            'name' => [
                'rules' => 'required',
            ],
            'username' => [
                'rules' => 'required',
            ],
            'email' => [
                'rules' => 'required',
            ],
            'phone' => [
                'rules' => 'required',
            ],
            'address' => [
                'rules' => 'required',
            ],
        ];

        if ($validateWithPassword) {
            $rules['password'] = [
                "rules" => "required",
            ];
        }

        $validator = \Config\Services::validation();
        $validator->setRules($rules);

        return $validator;
    }
}
