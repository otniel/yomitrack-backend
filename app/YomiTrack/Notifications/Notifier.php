<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 11/1/14
 * Time: 2:35 PM
 */

namespace YomiTrack\Notifications;

use Pusher;
class Notifier {
    public function notify() {
        $message = "This is just an example message!";
        Pusherer::trigger('yomitrack-channel', 'customerNearRestaurant', ['promo' => 'LLEVATE 2x1 EN HOTCAKES']);
        return 'Done';
    }
}
