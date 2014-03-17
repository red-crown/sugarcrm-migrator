<?php

namespace Fbsg\Data\Fields;


class DateTime extends Date
{
    protected $defaultOptions = [
        'format_from' => 'm/d/Y',
        'format_to'   => 'Y-m-d H:i:s',
    ];
}