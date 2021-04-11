<?php

namespace Auth\Test;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

final class ReadEnvTest extends TestCase
{
    /**
     * testReadEnv
     *
     * @return void
     */
    public function testReadEnv(): void
    {

        // Read Env file
        $dotenv = Dotenv::createImmutable('./');
        $dotenv->load();

        $result = $_ENV['ENV_LOADING_TEST'];

        $actual = true;

        // Read Env Contents
        if ($result !== 'Success_to_load_env_file') {
            echo 'Env file should Define: ENV_LOADING_TEST=Success_to_load_env_file';
            $actual =  false;
        }

        $this->assertTrue($actual);
    }
}