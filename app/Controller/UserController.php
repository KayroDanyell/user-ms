<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\DeleteUserRequest;
use App\Request\IndexUserRequest;
use App\Request\StoreUserRequest;
use App\Request\UpdateUserRequest;
use App\Services\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[Controller]
class UserController
{
//    #[Inject]
    protected UserService $service;

    public function __construct()
    {
        $this->service = make(UserService::class);
    }

    #[RequestMapping(path: "/users", methods: 'GET')]
    public function index(IndexUserRequest $request, ResponseInterface $response)
    {
        return $this->service->getAllUsers();
    }

    #[RequestMapping(path: "/user/{id}", methods: 'GET')]
    public function show(string $id, IndexUserRequest $request, ResponseInterface $response)
    {
        return $this->service->getUser($id);
    }
    #[RequestMapping(path: "/users", methods: 'POST')]
    public function store(StoreUserRequest $request, ResponseInterface $response)
    {
        return $this->service->saveUser($request->all());
    }

    #[RequestMapping(path: "/users/{id}", methods: 'PUT')]
    public function update(UpdateUserRequest $request, ResponseInterface $response)
    {
        return $this->service->updateUser($request->input('id'), $request->all());
    }
    #[RequestMapping(path: "/users/{id}", methods: 'DELETE')]
    public function delete(DeleteUserRequest $request, ResponseInterface $response)
    {
        return $this->service->deleteUser($request->input('id'));
    }
}
