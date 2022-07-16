<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\Chat;
use App\Models\User;
use CodeIgniter\I18n\Time;

class ChatController extends BaseController
{
    public function index()
    {
//        $chats = (new Chat())->whereIn('sender_id', [User::ROLE_CONSULTANT, User::ROLE_CLIENT])
//                             ->orWhereIn('receiver_id', [User::ROLE_CLIENT, User::ROLE_CONSULTANT])
//                             ->findAll();

        $users = (new User())->whereIn('role', [User::ROLE_CONSULTANT, User::ROLE_CLIENT])->whereNotIn('id', [session()->get('user')->id])->findAll();

        return view('member/pages/chat/index', compact('users'));
    }

    public function edit($userId)
    {
        $users = (new User())->whereIn('role', [User::ROLE_CONSULTANT, User::ROLE_CLIENT])->whereNotIn('id', [session()->get('user')->id])->findAll();
        $chats = (new Chat())->whereIn('sender_id', [session()->get('user')->id, $userId])
                             ->WhereIn('receiver_id', [session()->get('user')->id, $userId])
                             ->findAll();

        $receiver  = (new User())->where('id', $userId)->first();

        return view('member/pages/chat/form', compact('users', 'chats', 'receiver'));
    }

    public function store($userId)
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

        (new Chat())->insert(array_merge($this->request->getVar(), [
            "receiver_id" => $userId,
            "sender_id"   => session()->get('user')->id,
            "created_at"  => Time::now()->toDateTimeString(),
        ]));

        return redirect()->route('member.chats.edit', [$userId]);
    }
}
