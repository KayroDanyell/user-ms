<?php

namespace App\Interface\Repository;

use App\Model\UserInfo;
use Hyperf\Database\Model\Collection;

interface UserRepositoryInterface
{

    public function getUser(string $userId); //: Collection;


    public function getUserInfo(string $id) ;//: Collection;


    public function saveUser(array $user): Collection;
}