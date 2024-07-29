<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');

error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');

Swoole\Runtime::enableCoroutine(true);

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require BASE_PATH . '/vendor/autoload.php';

! defined('SWOOLE_HOOK_FLAGS') && define('SWOOLE_HOOK_FLAGS', Hyperf\Engine\DefaultOption::hookFlags());

Hyperf\Di\ClassLoader::init();

$container = require BASE_PATH . '/config/container.php';

$config = $container->get(ConfigInterface::class);

run(function () {
    \Hyperf\DbConnection\Db::connection('default')->statement('CREATE DATABASE IF NOT EXISTS `testing`');
});
if ($config->get('app_env') !== 'pipeline') {
    $config->set('databases.default.database', 'testing');
}

run(fn ()=> $container->get(Hyperf\Contract\ApplicationInterface::class));

run(function () use ($container) {
    $container = ApplicationContext::getContainer();
    $container->get('Hyperf\Database\Commands\Migrations\FreshCommand')->run(
        new Symfony\Component\Console\Input\StringInput(''),
        new Symfony\Component\Console\Output\ConsoleOutput()
    );
});