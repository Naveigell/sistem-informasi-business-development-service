<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class ClientController extends BaseController
{
    public function index()
    {
        $clients = (new User())->where('role', User::ROLE_CLIENT)->findAll();

        return view('admin/pages/client/index', compact('clients'));
    }

    public function create()
    {
        return view('admin/pages/client/form');
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
            "role"     => User::ROLE_CLIENT,
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            "avatar"   => $imageName,
        ]));

        return redirect()->route('admin.clients.index')->withInput()->with('success', 'Klien berhasil di tambah');
    }

    public function edit($clientId)
    {
        $client = (new User())->where('id', $clientId)->where('role', User::ROLE_CLIENT)->first();

        return view('admin/pages/client/form', compact('client'));
    }

    public function update($clientId)
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

        (new User())->update($clientId, array_merge($this->request->getVar(), [
            "avatar" => $imageName,
        ]));

        return redirect()->route('admin.clients.index')->withInput()->with('success', 'Klien berhasil di ubah');
    }

    public function destroy($clientId)
    {
        (new User())->delete($clientId);

        return redirect()->route('admin.clients.index')->withInput()->with('success', 'Klien berhasil di hapus');
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
