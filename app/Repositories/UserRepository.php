<?php

namespace App\Repositories;

use App\Interface\Repository\UserRepositoryInterface;
use App\Model\User;
use App\Model\UserInfo;
use Hyperf\Database\Model\Collection;
use Hyperf\Stringable\Str;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(){}

    public function getUser(string $userId) : Collection
    {
        $userInfo = self::getUserInfo($userId);
        return $userInfo;
    }

    public function getUserInfo(string $id) : Collection
    {
        return UserInfo::where('user_id', $id)->get();
    }

    public function saveUser(array $user) : Collection
    {
        $createdUsers = new Collection();
        $userId = Str::uuid();
        $keys = array_keys($user);
        foreach ($keys as $key => $value)  {

            $userInfo = new UserInfo();
            $userInfo->user_id = $userId;
            $userInfo->field = $value;
            $userInfo->value = $user[$value];
            $userInfo->save();
            $createdUsers->add($userInfo);
        }
        return $createdUsers;
    }
}