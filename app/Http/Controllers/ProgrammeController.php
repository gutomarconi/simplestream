<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgrammeResource;
use App\Models\Programme;
use Illuminate\Http\Request;

/**
 * Class ProgrammeController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ProgrammeController extends Controller
{
    /**
     * Get a Programme by the given Id
     *
     * @param Request $request
     *
     * @return ProgrammeResource|array
     */
    public function get(Request $request)
    {
        $programme = Programme::with(['channel'])
            ->where('id', $request->programmeId)
            ->where('channel_id',$request->channelId)
            ->first();
        if (empty($programme->id)) {
            return ['message' => 'record not found'];
        }
        return new ProgrammeResource($programme);
    }
}
