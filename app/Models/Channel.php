<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Channel
 * @package App
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class Channel extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'channel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
    ];

    /**
     * ChannelController - ProgrammeController relationship where a ChannelController has many programmes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programme(): HasMany
    {
        return $this->hasMany(Programme::class);
    }
}
