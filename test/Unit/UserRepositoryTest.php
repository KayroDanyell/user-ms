<?php

namespace HyperfTest\Unit;



use App\External\Interface\TransferAuthorization\TransferAuthorizationServiceInterface;
use App\Model\UserInfo;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Hyperf\Context\ApplicationContext;
use Hyperf\DbConnection\Db;
use Hyperf\Testing\TestCase;
use Mockery;
use function Hyperf\Support\make;

class UserRepositoryTest extends TestCase
{
    protected UserRepository $repository;
    protected UserService $service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = make(UserRepository::class,);
//        $this->service = make(UserService::class,[
//            'repository' => $mock]);
        DB::beginTransaction();
    }

//    public function testContainer()
//    {
//        $userInfoCollection =[ (new UserInfo(['user_id' => 1, 'field' => 'test', 'value' => 'test']))->save(),
//            (new UserInfo(['user_id' => 1, 'field' => 'test2', 'value' => 'test2']))->save(),
//            (new UserInfo(['user_id' => 1, 'field' => 'test3', 'value' => 'test3']))->save()];
//
//        /*$mock = $this->mockClassMethod(UserRepository::class,'getUserInfo', 'é a tropa');
//        $mock->getUserInfo(1); assim funciona*/
//
//
//        $mock = Mockery::mock(UserRepository::class) //parametro do mock() deve condizer com oq esta sendo injetado
//        ->shouldReceive('getUserInfo')
//            ->andReturn('1PORRA');
//
//
//        $container = ApplicationContext::getContainer();
//        $container->define(
//            UserRepository::class,
//            fn () => $mock->getMock()->makePartial(),
//        );
//
//        $user = $this->repository->getUser(1);
//    }


//    public function testGetUserInfo()
//    {
//        $this->repository->saveUserInfo(['user_id' => 1, 'field' => 'test', 'value' => 'test']);
//        $id = 1;
//        $userInfo = $this->repository->getUserInfo($id);
//        foreach ($userInfo as $key => $value) {
//            $this->assertNotEmpty($value);
//            $this->assertEquals($value->user_id, $id);
//        }
//
//    }
//
//    public function testGetUser(){
//
//
//
//       $userInfoCollection =[ (new UserInfo(['user_id' => 1, 'field' => 'test', 'value' => 'test']))->save(),
//        (new UserInfo(['user_id' => 1, 'field' => 'test2', 'value' => 'test2']))->save(),
//        (new UserInfo(['user_id' => 1, 'field' => 'test3', 'value' => 'test3']))->save()];
//
//
////        testar aplicar o make e depois o inject e por promocao de prop
//
////        lembrar de aplicar essas duas linhas:
//        $container = ApplicationContext::getContainer();
//        $container->define(UserRepository::class, fn () => $mockRepo->getMock()->makePartial());
//
//        $user = $this->repository->getUser(1);
//        $this->assertNotEmpty($user->fields);
//        $this->assertContains('test', $user->fields);
//        $this->assertContains('test2', $user->fields);
//        $this->assertContains('test3', $user->fields);
//    }

    public function mockClassMethod(string $className, string $methodName, $return)
    {
        $mock = $this->createMock($className);
        $mock->method($methodName)->willReturn($return);

        return $mock;
    }
    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        DB::rollback();
    }

}