<?php

namespace Auth;

use Auth\Test\AutoloadTest;
use Dotenv\Dotenv;

class GeneralTest
{
    public function execute(): void
    {
        require './vendor/autoload.php';
        
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
            echo 'SUCCESS to Autoload';
            return true;
        }
        return false;
    }

    private function isEnvLoaded(): bool
    {
        $dotenv = Dotenv::createImmutable(__DIR__);

        var_dump($dotenv->load());
        return false;
    }
}

$generalTest = new GeneralTest();
$generalTest->execute();
    //初期化

    //.envの保存場所指定（カレントに設定）
    // $dotenv = new Auth\Dotenv\Dotenv(__DIR__);

    // $dotenv->load();

    //利用
    //値を取得
    // $name = getenv('NAME');
    // echo $name;