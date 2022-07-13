<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsCategory;

class NewsCategoryController extends BaseController
{
    public function index()
    {
        $newsCategories = (new NewsCategory())->findAll();

        return view('admin/pages/news_category/index', compact('newsCategories'));
    }

    public function create()
    {
        return view('admin/pages/news_category/form');
    }

    public function store()
    {
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new NewsCategory())->insert(array_merge($this->request->getVar(), [
            "slug" => str_slug($this->request->getVar('name')),
        ]));

        return redirect()->route('admin.news-categories.index')->withInput()->with('success', 'Kategori berhasil ditambah');
    }

    public function edit($categoryId)
    {
        $category = (new NewsCategory())->where('id', $categoryId)->first();

        return view('admin/pages/news_category/form', compact('category'));
    }

    public function update($categoryId)
    {
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new NewsCategory())->update($categoryId, array_merge($this->request->getVar(), [
            "slug" => str_slug($this->request->getVar('name')),
        ]));

        return redirect()->route('admin.news-categories.index')->withInput()->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($categoryId)
    {
        (new NewsCategory())->delete($categoryId);

        return redirect()->route('admin.news-categories.index')->withInput()->with('success', 'Kategori berhasil dihapus');
    }

    private function validator()
    {
        $validator = \Config\Services::validation();
        $validator->setRules([
            "name" => [
                "rules" => "required",
            ]
        ]);

        return $validator;
    }
}
