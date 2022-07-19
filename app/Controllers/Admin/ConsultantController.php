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
        $avatar    = $this->request->getFile('avatar');
        $validator = $this->validator(true);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $imageName = null;

        if ($avatar->isFile()) {
            $imageName = str_random(40) . '.' . $avatar->getClientExtension();

            $avatar->move(ROOTPATH . 'public/uploads/images/users', $imageName);
        }

        (new User())->insert(array_merge($this->request->getVar(), [
            "role"     => User::ROLE_CONSULTANT,
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            "avatar"   => $imageName,
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
        $avatar    = $this->request->getFile('avatar');
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $imageName = null;

        if ($avatar->isFile()) {
            $imageName = str_random(40) . '.' . $avatar->getClientExtension();

            $avatar->move(ROOTPATH . 'public/uploads/images/users', $imageName);
        }

        (new User())->update($consultantId, array_merge($this->request->getVar(), [
            "avatar" => $imageName,
        ]));

        return redirect()->route('admin.consultants.index')->withInput()->with('success', 'Konsultan berhasil di ubah');
    }

    public function destroy($consultantId)
    {
        (new User())->delete($consultantId);

        return redirect()->route('admin.consultants.index')->withInput()->with('success', 'Konsultan berhasil di hapus');
    }

    private function validator($validateWithPassword = false)
    {
        $avatar = $this->request->getFile('avatar');
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

        if ($avatar->isFile()) {
            $rules['image'] = [
                'rules' => 'uploaded[avatar]|mime_in[avatar,image/png,image/jpg,image/jpeg]',
            ];
        }

        $validator = \Config\Services::validation();
        $validator->setRules($rules);

        return $validator;
    }
}
