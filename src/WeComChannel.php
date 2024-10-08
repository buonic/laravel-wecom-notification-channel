<?php

namespace Buonic\Notifications;

use GuzzleHttp\Client;
use \Illuminate\Notifications\Notification as Notification;

class WeComChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $key = config('wecom-notification-channel.key');
        if (empty($key)) {
            throw new \Exception('No wecom.key specified');
        }

        $message = $notification->toWeCom($notifiable);
        $client = new Client();

        return $client->request('POST', 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=' . $key, [
            'json' => $message->getBody(),
        ]);
    }
}
