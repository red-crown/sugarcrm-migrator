<?php

namespace tests\Fbsg\Data\Fields;

use Fbsg\Data\Fields\Dropdown;
use tests\Fbsg\TestCase;

class DropdownTest extends TestCase
{
    /**
     * @var Dropdown
     */
    protected $defaultDropdown;

    /**
     * @var array
     */
    protected $defaults = [
        'value'   => 'Test Value 1',
        'options' => [
            'wrapper' => '^',
            'default' => 'test_value_default',
            'mapping' => [
                'Test Value 1' => 'test_value_1',
                'Test Value 2' => 'test_value_2',
            ],
        ],
    ];

    public function setup()
    {
        $this->defaultDropdown = new Dropdown($this->defaults['value'], $this->defaults['options']);
    }

    public function test_it_transforms_provided_value()
    {
        $this->assertEquals('test_value_1', $this->defaultDropdown->getValue());
    }
}