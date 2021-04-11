<?php

namespace Auth\Test;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;

final class MonologActiveTest extends TestCase
{
    /**
     * Is Monolog Active
     *
     * @return void
     */
    public function testIsMonologActive(): void
    {
        $logDir = './log/';
        $logName = 'sample.log';

        $log = new Logger('SampleTestLog');
        $log->pushHandler(new StreamHandler($logDir . $logName, Logger::WARNING));

        $log->warning('Foo');
        $log->error('Bar');

        $logFile = glob($logDir . '*');

        $this->assertSame($logFile[0], $logDir . $logName);
    }
}