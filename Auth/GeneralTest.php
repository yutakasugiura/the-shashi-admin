<?php

namespace Auth;

use Auth\Test\AutoloadTest;
use Dotenv\Dotenv;

require './vendor/autoload.php';

class GeneralTest
{
    /**
     * Execute Test
     *
     * @return void
     */
    public function execute(): void
    {   
        $this->isClassLoaded();
        $this->isEnvLoaded();

    }

    /**
     * @return boolean
     */
    private function isClassLoaded(): bool
    {
        $autoloadTest = new AutoloadTest();
        $testMessage = $autoloadTest->execute();
        
        if ($testMessage === 'SUCCESS to Autoload') {
            echo 'SUCCESS to Class File Autoload';
            return true;
        }
        return false;
    }

    private function isEnvLoaded(): bool
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $result = $_ENV['ENV_LOADING_TEST'];

        if ($result === 'Success_to_load_env_file') {
            echo 'SUCCESS to ENV File Autoload';
            return true;
        }
        return false;
    }
}

/**
 * Execute Command
 *  - php GeneralTest.php
 */
$generalTest = new GeneralTest();
$generalTest->execute();