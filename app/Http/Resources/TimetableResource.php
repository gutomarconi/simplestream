<?php

namespace App\Http\Resources;

use App\Utilities\Date;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TimetableResource
 * @package App\Http\Resources
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class TimetableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $dateUtil = new Date();
        $startTime = $dateUtil->toTimeZone($this->start_time, $request->timezone);
        $endTime = $dateUtil->toTimeZone($this->end_time, $request->timezone);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'duration' => strtotime($endTime) - strtotime($startTime),
        ];
    }

}

