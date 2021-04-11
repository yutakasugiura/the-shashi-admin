<?php
namespace Auth;

use Config;
use Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Auth\Exception\ValidationException;
use Auth0\SDK\Auth0;

Class AuthLogin
{
    /**
     * EXECUTE
     *  ### setup environment
     *   - composer install
     * 
     *  ### setup command
     *   - cd auth
     *   - php -S localhost:8000
     * 
     *  ### setup browser
     *   - http://localhost:8000/
     *   - Default route '/' connect 'index.php'
     * 
     */
    public function execute()
    {
        $this->isAuthUser();
        try {
            $this->validateValue();
        } catch (Exception $e) {
            $message = $e->getMessage(); // send error message
            return include('error/403.php');
        }
    }

    /**
     * CheckSessionId
     *
     * @return boolean
     */
    private function isAuthUser(): bool
    {
        var_dump('===========\n');

        // $sessionId = (string) $_COOKIE['_authS'];
        return true;
       
    }

    /**
     * Check  from FORM
     */
    private function validateValue(): bool
    {
        $name = (string) $_POST['name'];
        $password = (string) $_POST['password'];
        $sessionId = (string) $_COOKIE['_authS'];

        if (!$name || !$password || !$sessionId) {
            throw new Exception('無効な値が入力されています');
        }

        $this->getUsers($name, $password, $sessionId);
    
        return true;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @param string $password
     * @return void
     */
    private function getUsers(string $name, string $password, string $sessionId): void
    {
        var_dump($name);
        var_dump($password);
        var_dump($sessionId);
    }

    /**
     * 脆弱性チェック
     *  - SQL Injection (Invalid for Query for SQL)
     *
     * @param string $string
     * @return string
     */
    private function removeVulnerability(string $string): string
    {
        return '後で実装する';
    }
}

/**
 * Execute
 * 
 * 1. from browser => HTML file post auth.php  
 * 2. from api => curl command auth.php 
 */
$auth = new AuthLogin();
$auth->execute();
