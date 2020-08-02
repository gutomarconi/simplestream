<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Http\Resources\ChannelResource;
use Illuminate\Http\Request;

/**
 * Class ChannelController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ChannelController extends Controller
{
    /**
     * Retrieves channel list
     *
     * @param Request $request - request object use to filter query results
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getList(Request $request)
    {
        $channels = Channel::all();
        return ChannelResource::collection($channels);
    }
}
