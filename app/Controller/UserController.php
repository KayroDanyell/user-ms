<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repositories\UserRepository;
use App\Request\DeleteUserRequest;
use App\Request\IndexUserRequest;
use App\Request\StoreUserRequest;
use App\Request\UpdateUserRequest;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[Controller]
class UserController
{
    #[RequestMapping(path: "/users", methods: 'GET')]
    public function index(IndexUserRequest $request, ResponseInterface $response)
    {
        return UserRepository::getAllUsers();
    }

    #[RequestMapping(path: "/users", methods: 'POST')]
    public function store(StoreUserRequest $request, ResponseInterface $response)
    {
        return UserRepository::saveUser($request->all());
    }

    #[RequestMapping(path: "/users/{id}", methods: 'PUT')]
    public function update(UpdateUserRequest $request, ResponseInterface $response)
    {
        return UserRepository::updateUser($request->input('id'), $request->all());
    }
    #[RequestMapping(path: "/users/{id}", methods: 'DELETE')]
    public function delete(DeleteUserRequest $request, ResponseInterface $response)
    {
        return UserRepository::deleteUser($request->input('id'));
    }
}
