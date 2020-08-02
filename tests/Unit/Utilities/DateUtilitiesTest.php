<?php

namespace Tests\Unit;

use App\Utilities\Date;
use PHPUnit\Framework\TestCase;

/**
 * Class DateUtilitiesTest
 * @package Tests\Unit
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class DateUtilitiesTest extends TestCase
{
    /**
     * Test ToTimezone convertion
     *
     * @covers \App\Utilities\Date::toTimezone
     *
     * @return void
     */
    public function testToTimezone(): void
    {
        $date = '2020-08-01 04:00:00Z';
        $timezone = 'America/Los_Angeles';

        $dateUtil = new Date();
        $actual = $dateUtil->toTimezone($date, $timezone);
        $this->assertIsString($actual);
        $this->assertEquals('2020-07-31 21:00:00', $actual);
    }

    /**
     * Test ToStartOfDay when returns the start of the day for a given
     * date
     *
     * @covers \App\Utilities\Date::toStartOfDay
     *
     * @return void
     */
    public function testToStartOfDay(): void
    {
        $date = '2020-08-01 04:00:00Z';

        $dateUtil = new Date();
        $actual = $dateUtil->toStartOfDay($date);
        $this->assertIsString($actual);
        $this->assertEquals('2020-08-01 00:00:00', $actual);
    }

    /**
     * Test ToStartOfDay when returns the start of the day for a given
     * date
     *
     * @covers \App\Utilities\Date::toEndOfDay
     *
     * @return void
     */
    public function testToEndOfDay(): void
    {
        $date = '2020-08-01 04:00:00Z';

        $dateUtil = new Date();
        $actual = $dateUtil->toEndOfDay($date);
        $this->assertIsString($actual);
        $this->assertEquals('2020-08-01 23:59:59', $actual);
    }
}
