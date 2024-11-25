<?php

namespace App\Services;

use App\Interface\Repository\UserRepositoryInterface;
use App\Model\User;
use App\Repositories\UserRepository;
use Exception;
use Hyperf\Di\Annotation\Inject;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class UserService
{
//    #[Inject]
    protected UserRepositoryInterface $repository;

    public function __construct(){
      $this->repository = make(UserRepositoryInterface::class);
//        testar colocar o userrepository com make aqui
    }

    public function getAllUsers()
    {
        try {
            return $this->repository->getAll();
        }catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function getUser(string $userId)
    {
        try {
            $userInfo =  $this->repository->getUser($userId);
            return User::fromUserInfo($userInfo);
        }catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function saveUser(array $all) : User
    {
        try {
            $userInfo = $this->repository->saveUser($all);
            return User::fromUserInfo($userInfo);
        }catch (Throwable $e) {

        }
    }
}