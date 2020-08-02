<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimetableResource;
use App\Services\TimetableFinder;
use Illuminate\Http\Request;

/**
 * Class TimetableController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class TimetableController extends Controller
{
    /**
     * Get timetable for given date, timezone and channel id
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function get(Request $request)
    {
        $timetableFinder = new TimetableFinder([
            'date' => $request->date ?? '',
            'timezone' => $request->timezone ?? '',
            'channelId' => $request->channelId ?? 0,
        ]);
        $programmes = $timetableFinder->find();
        return TimetableResource::collection($programmes);
    }
}
