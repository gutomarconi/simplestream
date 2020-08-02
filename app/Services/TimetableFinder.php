<?php

namespace App\Services;

use App\Constants\General;
use App\Utilities\Date;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class TimetableFinder
 * @package App\Services
 *
 * Timetable finder is a service to build a timetable
 * for a given channel, date and timezone
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class TimetableFinder
{
    /**
     * Date to filter programmes
     *
     * @var string
     */
    protected $date;

    /**
     * Timezone to build the timetable
     *
     * @var string
     */
    protected $timezone;

    /**
     * Channel Id to filter programmes
     *
     * @var int
     */
    protected $channelId;

    /**
     * Date utility class
     *
     * @var Date
     */
    protected $dateUtility;

    public function __construct(array $config)
    {
        $this->date = $config['date'];
        $this->timezone = $config['timezone'];
        $this->channelId = $config['channelId'];
        $this->dateUtility = new Date();
    }

    /**
     * Get Date to filter programmes
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get Timezone to build the timetable
     *
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * Get Channel Id to filter programmes
     *
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * Get Date utility class to handle date operations
     *
     * @return Date
     */
    public function getDateUtil(): Date
    {
        return $this->dateUtility;
    }

    /**
     * Find the timetable for the given date, timezone and channel.
     * It will get the whole day at UTC, filter the database and return
     * the programmes
     *
     * @return \Illuminate\Support\Collection
     */
    public function find(): Collection
    {
        $date = $this->dateToUTC();
        $startTime = $this->getDateUtil()->toStartOfDay($date);
        $endTime = $this->getDateUtil()->toEndOfDay($date);
        $programmes = DB::table('programme')
            ->where('channel_id', $this->getChannelId())
            ->whereBetween('start_time', [$startTime, $endTime])
            ->get();
        return $programmes;
    }

    /**
     * Convert date to UTC to filter the DB records
     *
     * @return string
     */
    public function dateToUTC(): string
    {
        return $this->getDateUtil()->toTimeZone(
            $this->getDate(),
            General::BASE_TIMEZONE
        );
    }
}
