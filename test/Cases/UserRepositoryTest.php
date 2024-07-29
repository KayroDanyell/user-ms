<?php

namespace HyperfTest\Cases;



use App\Model\UserInfo;
use App\Repositories\UserRepository;
use Hyperf\DbConnection\Db;
use PHPUnit\Framework\TestCase;
use function Hyperf\Support\make;

class UserRepositoryTest extends TestCase
{
    protected UserRepository $repository;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->repository = make(UserRepository::class);
        DB::beginTransaction();
    }


    public function testGetUserInfo()
    {
        $this->repository->saveUserInfo(['user_id' => 1, 'field' => 'test', 'value' => 'test']);
        $id = 1;
        $userInfo = $this->repository->getUserInfo($id);
        foreach ($userInfo as $key => $value) {
            $this->assertNotEmpty($value);
            $this->assertEquals($value->user_id, $id);
        }

    }

    public function testGetUser(){

        (new UserInfo(['user_id' => 1, 'field' => 'test', 'value' => 'test']))->save();
        (new UserInfo(['user_id' => 1, 'field' => 'test2', 'value' => 'test2']))->save();
        (new UserInfo(['user_id' => 1, 'field' => 'test3', 'value' => 'test3']))->save();

        /*$mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('getUserInfo')->willReturn($userInfoCollection);*/

        $user = $this->repository->getUser(1);
        $this->assertNotEmpty($user->fields);
        $this->assertContains('test', $user->fields);
        $this->assertContains('test2', $user->fields);
        $this->assertContains('test3', $user->fields);
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        DB::rollback();
    }
}