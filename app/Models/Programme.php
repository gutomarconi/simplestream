<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Programme
 * @package App
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class Programme extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'programme';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'channel_id',
    ];

    /**
     * ProgrammeController - ChannelController relationship where a ProgrammeController belongs to a ChannelController
     *
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }
}
