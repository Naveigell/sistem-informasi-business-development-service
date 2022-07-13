<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends BaseController
{
    public function index($category)
    {
        $category = (new NewsCategory())->where('slug', $category)->first();
        $news = (new News())->where('category_id', $category['id'])->findAll();

        return view('member/pages/news/index', compact('news', 'category'));
    }

    public function detail($categorySlug, $newsSlug)
    {
        $category = (new NewsCategory())->where('slug', $categorySlug)->first();
        $news = (new News())->where('slug', $newsSlug)->first();

        return view('member/pages/news/detail', compact('news', 'category'));
    }
}
