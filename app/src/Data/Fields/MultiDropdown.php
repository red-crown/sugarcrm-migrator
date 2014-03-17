<?php

namespace Fbsg\Data\Fields;


class MultiDropdown extends Dropdown
{
    protected $defaultOptions = [
        'wrapper'   => '^',
        'mapping'   => false,
        'default'   => '',
        'separator' => ',',
    ];

    protected static $formatterClass = '\Fbsg\Data\Formatters\MultiDropdown';
}