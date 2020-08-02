<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProgrammeResource
 * @package App\Http\Resources
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ProgrammeResource extends JsonResource
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'duration' => strtotime($this->end_time) - strtotime($this->start_time),
            'channel' => new ChannelResource($this->whenLoaded('channel'))
        ];
    }
}
