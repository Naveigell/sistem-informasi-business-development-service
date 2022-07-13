<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends BaseController
{
    public function index()
    {
        $news = (new News())->findAll();

        return view('admin/pages/news/index', compact('news'));
    }

    public function create()
    {
        $categories = (new NewsCategory())->findAll();

        return view('admin/pages/news/form', compact('categories'));
    }

    public function store()
    {
        $validator = \Config\Services::validation();
        $validator->setRules([
            'category_id' => [
                'rules' => 'required',
            ],
            'thumbnail' => [
                'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]',
            ],
            'title' => [
                'rules' => 'required',
            ],
            'description' => [
                'rules' => 'required',
            ],
        ]);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $image     = $this->request->getFile('thumbnail');
        $imageName = str_random(40) . '.' . $image->getClientExtension();

        $image->move(ROOTPATH . 'public/uploads/images/news', $imageName);

        (new News())->insert(array_merge($this->request->getVar(), [
            "thumbnail" => $imageName,
        ]));

        return redirect()->route('admin.news.index')->withInput()->with('success', 'Berita berhasil ditambah');
    }

    public function edit($newsId)
    {
        $news = (new News())->where('id', $newsId)->first();
        $categories = (new NewsCategory())->findAll();

        return view('admin/pages/news/form', compact('news', 'categories'));
    }

    public function update($newsId)
    {
        $thumbnail = $this->request->getFile('thumbnail');
        $rules = [
            'category_id' => [
                'rules' => 'required',
            ],
            'title' => [
                'rules' => 'required',
            ],
            'description' => [
                'rules' => 'required',
            ],
        ];

        if ($thumbnail->isFile()) {
            $rules['thumbnail'] = [
                'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/png,image/jpg,image/jpeg]',
            ];
        }

        $validator = \Config\Services::validation();
        $validator->setRules($rules);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        if ($thumbnail->isFile()) {

            $imageName = str_random(40) . '.' . $thumbnail->getClientExtension();

            $thumbnail->move(ROOTPATH . 'public/uploads/images/news', $imageName);

            (new News())->update($newsId, [
                "thumbnail" => $imageName,
            ]);
        }

        (new News())->update($newsId, $this->request->getVar());

        return redirect()->route('admin.news.index')->withInput()->with('success', 'Berita berhasil diubah');
    }

    public function destroy($newsId)
    {
        (new News())->delete($newsId);

        return redirect()->route('admin.news.index')->withInput()->with('success', 'Berita berhasil dihapus');
    }
}
