<?php

namespace Auth\Test;

use PHPUnit\Framework\TestCase;

/**
 * Execute Command
 *  - All Test: vendor/bin/phpunit
 *  - Single Test: vendor/bin/phpunit Test/SampleTest.php
 *     - should Define Dir & .php
 */
final class PHPUnitActiveTest extends TestCase
{
    /**
     * Execute Sample Test
     *  - is php unit active?
     *
     * @return void
     */
    public function testIsPHPUnitActive(): void
    {
        $this->assertTrue(True);
    }
}