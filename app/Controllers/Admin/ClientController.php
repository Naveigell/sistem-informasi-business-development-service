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
        $validator = $this->validator(true);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new User())->insert(array_merge($this->request->getVar(), [
            "role"     => User::ROLE_CLIENT,
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
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
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new User())->update($clientId, $this->request->getVar());

        return redirect()->route('admin.clients.index')->withInput()->with('success', 'Klien berhasil di ubah');
    }

    public function destroy($clientId)
    {
        (new User())->delete($clientId);

        return redirect()->route('admin.clients.index')->withInput()->with('success', 'Klien berhasil di hapus');
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
