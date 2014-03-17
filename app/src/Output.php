<?php

namespace Fbsg;


class Output
{
    /**
     * @var array
     */
    protected $colors = [
        'RED'   => '0;31',
        'GREEN' => '0;32',
        'WHITE' => '1;37',
    ];

    public function writeLn($message, $color = 'WHITE')
    {
        echo "\033[" . $this->colors[$color] . "m" . $message . "\033[0m" . PHP_EOL;
    }

    public function writeError($message)
    {
        $this->writeLn($message, 'RED');
    }

    public function writeSuccess($message)
    {
        $this->writeLn($message, 'GREEN');
    }

    public function error($message)
    {
        $this->writeError($message);
    }

    public function success($message)
    {
        $this->writeSuccess($message);
    }
}