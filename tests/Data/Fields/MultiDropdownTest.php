<?php

namespace tests\Fbsg\Data\Fields;

use Fbsg\Data\Fields\MultiDropdown;
use tests\Fbsg\TestCase;

class MultiDropdownTest extends TestCase
{
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

    public function test_it_transforms_provided_value()
    {
        $dd1 = new MultiDropdown($this->defaults['value'], $this->defaults['options']);
        $dd2 = new MultiDropdown('Test Value 1, Test Value 2', $this->defaults['options']);

        $this->assertEquals('^test_value_1^', $dd1->getValue());
        $this->assertEquals('^test_value_1^,^test_value_2^', $dd2->getValue());
    }
}