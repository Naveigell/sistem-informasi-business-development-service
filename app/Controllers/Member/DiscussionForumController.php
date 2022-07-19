<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DiscussionForum;
use App\Models\DiscussionForumChat;
use CodeIgniter\I18n\Time;

class DiscussionForumController extends BaseController
{
    public function index()
    {
        $forums = (new DiscussionForum())->findAll();

        return view('member/pages/forum_discussion/index', compact('forums'));
    }

    public function edit($forumId)
    {
        $forum  = (new DiscussionForum())->where('id', $forumId)->first();
        $forums = (new DiscussionForum())->findAll();
        $chats  = (new DiscussionForumChat())->where('forum_id', $forumId)->findAll();

        return view('member/pages/forum_discussion/form', compact('forum', 'forums', 'chats'));
    }

    public function store($forumId)
    {
        $validator = \Config\Services::validation();
        $validator->setRules([
            'content' => [
                'rules' => 'required',
            ],
        ]);

        if (!$validator->run($this->request->getVar())) {
            return redirect()->back()->withInput()->with('errors', $validator->getErrors());
        }

        (new DiscussionForumChat())->insert(array_merge($this->request->getVar(), [
            "sender_id"   => session()->get('user')->id,
            "forum_id"    => $forumId,
            "created_at"  => Time::now()->toDateTimeString(),
        ]));

        if ($this->request->isAJAX()) {
            http_response_code(201);
        } else {
            return redirect()->route('member.forums.edit', [$forumId]);
        }
    }
}
