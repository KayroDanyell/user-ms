<?php

namespace HyperfTest\Cases;

use App\Interface\Repository\UserRepositoryInterface;
use App\Model\UserInfo;
use App\Repositories\UserRepository;
use Hyperf\Context\ApplicationContext;
use Hyperf\Database\Model\Collection;
use Hyperf\Testing\Concerns\InteractsWithContainer;
use HyperfTest\Cases\Abstract\AbstractTest;
use HyperfTest\HttpTestCase;
use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GetUserTest extends AbstractTest
{
    use InteractsWithContainer;

    public function setUp(): void
    {
        (new UserInfo(['user_id' => 1, 'field' => 'campo', 'value' => 'test']))->save();
        (new UserInfo(['user_id' => 1, 'field' => 'campo2', 'value' => 'test2']))->save();
        (new UserInfo(['user_id' => 1, 'field' => 'campo3', 'value' => 'test3']))->save();
        parent::setUp();
    }

    public static function generateUserInfo() : array
    {
        $userInfoNome =  (new UserInfo(['user_id' => 1, 'field' => 'nome', 'value' => 'jose']));
        $userInfoEmail = (new UserInfo(['user_id' => 1, 'field' => 'email', 'value' => 'jose@hotmail.com']));
        $userInfoCpf =   (new UserInfo(['user_id' => 1, 'field' => 'cpf', 'value' => '12345678']));
        return [
            [[$userInfoNome, $userInfoEmail, $userInfoCpf]]
        ];
    }

    #[DataProvider('generateUserInfo')]
    public function testGetUser22(array $expected){

        //nao necessario mockar metodos em testes de integracao, apenas consultas externas como api's por causa de conexao e etc q podem causar intermitencia nos testes
        $result = $this->client->get('/user/1');


    }
}