<?php

namespace App\Repositories;

use App\Model\UserInfo;

class UserRepository
{

    public function __construct()
    {
    }

    public function getUser()
    {
        $this->getUserInfo(1);

        format

        transforme to user

    }

    public function getUserInfo(int $id)
    {
        return UserInfo::where('user_id', $id)->get();
    }



}