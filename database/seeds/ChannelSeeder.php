<?php

use Illuminate\Database\Seeder;

/**
 * Class ChannelSeeder
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Channel::class, 10)
            ->create()
            ->each(function ($channel) {
                $channel->programme()->createMany(factory(App\Programme::class, 5)->make()->toArray());
        });
    }
}
