<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegionalCoordinator;

class RegionalCoordinatorController extends BaseController
{
    public function index()
    {
        $regionalCoordinators = (new RegionalCoordinator())->findAll();

        return view('admin/pages/regional_coordinator/index', compact('regionalCoordinators'));
    }

    public function create()
    {
        return view('admin/pages/regional_coordinator/form');
    }

    public function store()
    {
        $image = $this->request->getFile('thumbnail');
        $rules = [
            'region' => [
                'rules' => 'required',
            ],
            'leader' => [
                'rules' => 'permit_empty',
            ],
            'address' => [
                'rules' => 'permit_empty',
            ],
            'phone' => [
                'rules' => 'permit_empty',
            ],
        ];

        if ($image->isFile()) {
            $rules['thumbnail'] = [
                'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]',
            ];
        }

        $validator = \Config\Services::validation();
        $validator->setRules($rules);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $data = $this->request->getVar();

        if ($image->isFile()) {
            $image     = $this->request->getFile('thumbnail');
            $imageName = str_random(40) . '.' . $image->getClientExtension();

            $image->move(ROOTPATH . 'public/uploads/images/regional-coordinator', $imageName);

            $data = array_merge($data, [
                "thumbnail" => $imageName,
            ]);
        }

        (new RegionalCoordinator())->insert($data);

        return redirect()->route('admin.regional-coordinators.index')->withInput()->with('success', 'Koordinator Wilayah berhasil ditambahkan');
    }

    public function edit($regionalId)
    {
        $coordinator = (new RegionalCoordinator())->where('id', $regionalId)->first();

        return view('admin/pages/regional_coordinator/form', compact('coordinator'));
    }

    public function update($regionalId)
    {
        $image = $this->request->getFile('thumbnail');
        $rules = [
            'region' => [
                'rules' => 'required',
            ],
            'leader' => [
                'rules' => 'permit_empty',
            ],
            'address' => [
                'rules' => 'permit_empty',
            ],
            'phone' => [
                'rules' => 'permit_empty',
            ],
        ];

        if ($image->isFile()) {
            $rules['thumbnail'] = [
                'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]',
            ];
        }

        $validator = \Config\Services::validation();
        $validator->setRules($rules);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $data = $this->request->getVar();

        if ($image->isFile()) {
            $image     = $this->request->getFile('thumbnail');
            $imageName = str_random(40) . '.' . $image->getClientExtension();

            $image->move(ROOTPATH . 'public/uploads/images/regional-coordinator', $imageName);

            $data = array_merge($data, [
                "thumbnail" => $imageName,
            ]);
        }

        (new RegionalCoordinator())->update($regionalId, $data);

        return redirect()->route('admin.regional-coordinators.index')->withInput()->with('success', 'Koordinator Wilayah berhasil diubah');
    }

    public function destroy($regionalId)
    {
        (new RegionalCoordinator())->delete($regionalId);

        return redirect()->route('admin.regional-coordinators.index')->withInput()->with('success', 'Koordinator Wilayah berhasil dihapus');
    }
}
