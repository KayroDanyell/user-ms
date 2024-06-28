<?php

namespace HyperfTest\Unit;



use HyperfTest\BlueTestingClient;
use PHPUnit\Framework\TestCase;
use function Hyperf\Support\make;

class UserRepositoryTest extends TestCase
{

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testGetUserInfo(int $id)
    {
        return UserInfo::where('user_id', $id)->get();
    }
}