<?php

namespace App\Repositories;

use App\Model\User;
use App\Model\UserInfo;

class UserRepository
{

    public function __construct(){}

    public function getUser(int $userId) : User
    {
        $userInfo = self::getUserInfo($userId);

        $user = new User();
        $userInfo->each(function ($item) use (&$user) {
            $user->{$item->field} = $item->value;
        });
        $user->fields = $userInfo->pluck('field')->toArray();

        return $user;
    }

    public function getUserInfo(int $id)
    {
        return UserInfo::where('user_id', $id)->get();
    }

    public function saveUserInfo(array $data)
    {
        $user = new UserInfo();
        $user->user_id = $data['user_id'];
        $user->field   = $data['field'];
        $user->value   = $data['value'];
        $user->save();
    }



}