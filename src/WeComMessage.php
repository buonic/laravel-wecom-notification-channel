<?php

namespace Buonic\Notifications;

class WeComMessage
{
    public $lines = [];

    public function heading($text, $level = 1): WeComMessage
    {
        $tags = str_repeat('#', $level);
        $this->lines[] = "{$tags} $text \n";
        return $this;
    }

    public function bold($text): WeComMessage
    {
        $this->lines[] = "**{$text}** \n";
        return $this;
    }

    public function quote($text): WeComMessage
    {
        $this->lines[] = "> {$text} \n";
        return $this;
    }

    public function getBody()
    {
        $content = implode('', $this->lines);

        $data = [
            'msgtype' => 'markdown',
            'markdown' => [
                'content' => $content,
            ],
        ];

        return $data;
    }
}