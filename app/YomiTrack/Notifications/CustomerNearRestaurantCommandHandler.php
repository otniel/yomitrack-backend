<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 11/2/14
 * Time: 12:16 PM
 */

namespace YomiTrack\Notifications;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class CustomerNearRestaurantCommandHandler implements CommandHandler {

    use DispatchableTrait;
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {
        dd($command);
    }

} 