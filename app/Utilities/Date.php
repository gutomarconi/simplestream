<?php

namespace App\Utilities;

use DateTime;
use DateTimeZone;

/**
 * Class Date
 * @package App\Utilities
 *
 * Date utilities that contains all dates related operations
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class Date
{
    /**
     * Convert a date into a new timezone
     *
     * @param $date
     * @param $timezone
     *
     * @throws \Exception
     *
     * @return string
     */
    public function toTimezone($date, $timezone): string
    {
        try {
            $tz = new DateTimeZone($timezone);
            $date = new DateTime($date);
            $date->setTimezone($tz);
            return $date->format('Y-m-d H:i:s');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function toStartOfDay(string $date): string
    {
        $newDate = new DateTime($date);
        return $newDate->format('Y-m-d 00:00:00');
    }

    public function toEndOfDay(string $date): string
    {
        $newDate = new DateTime($date);
        return $newDate->format('Y-m-d 23:59:59');
    }
}
