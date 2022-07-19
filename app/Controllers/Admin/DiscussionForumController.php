<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DiscussionForum;

class DiscussionForumController extends BaseController
{
    public function index()
    {
        $forums = (new DiscussionForum())->findAll();

        return view('admin/pages/forum_discussion/index', compact('forums'));
    }

    public function create()
    {
        return view('admin/pages/forum_discussion/form');
    }

    public function store()
    {
        $thumbnail = $this->request->getFile('thumbnail');
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $imageName = null;

        if ($thumbnail->isFile()) {
            $imageName = str_random(40) . '.' . $thumbnail->getClientExtension();

            $thumbnail->move(ROOTPATH . 'public/uploads/images/forums', $imageName);
        }

        (new DiscussionForum())->insert(array_merge($this->request->getVar(), [
            "thumbnail" => $imageName,
        ]));

        return redirect()->route('admin.forums.index')->withInput()->with('success', 'Forum berhasil di tambah');
    }

    public function edit($forumId)
    {
        $forum = (new DiscussionForum())->where('id', $forumId)->first();

        return view('admin/pages/forum_discussion/form', compact('forum'));
    }

    public function update($forumId)
    {
        $thumbnail = $this->request->getFile('thumbnail');
        $validator = $this->validator();

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        $imageName = null;

        if ($thumbnail->isFile()) {
            $imageName = str_random(40) . '.' . $thumbnail->getClientExtension();

            $thumbnail->move(ROOTPATH . 'public/uploads/images/forums', $imageName);
        }

        (new DiscussionForum())->update($forumId, array_merge($this->request->getVar(), [
            "thumbnail" => $imageName,
        ]));

        return redirect()->route('admin.forums.index')->withInput()->with('success', 'Forum berhasil di ubah');
    }

    public function destroy($forumId)
    {
        (new DiscussionForum())->delete($forumId);

        return redirect()->route('admin.forums.index')->withInput()->with('success', 'Forum berhasil di hapus');
    }

    private function validator()
    {
        $thumbnail = $this->request->getFile('thumbnail');

        $rules = [
            'forum_name' => [
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

        return $validator;
    }
}
