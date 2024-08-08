<?php

namespace Buonic\Notifications;

use Illuminate\Support\ServiceProvider;

class WeComChannelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/wecom-notification-channel.php', 'wecom-notification-channel');

        $this->publishes([
            __DIR__.'/../config/wecom-notification-channel.php' => config_path('wecom-notification-channel.php'),
        ]);
    }
}