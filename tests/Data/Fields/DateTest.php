<?php

namespace tests\Fbsg\Data\Fields;

use tests\Fbsg\TestCase;
use Fbsg\Data\Fields\Date;

class DateTest extends TestCase
{
    protected $overrideOptions = [
        'format_from' => 'm/d/Y H:i',
        'format_to'   => 'Y-m-d',
    ];

    public function test_it_transforms_default_date_values()
    {
        $date = new Date('5/21/1986');

        $this->assertEquals('1986-05-21', $date->getValue());
    }

    public function test_it_transforms_custom_date_to_values()
    {
        $date = new Date('5/21/1986', ['format_to' => 'mdY']);

        $this->assertEquals('05211986', $date->getValue());
    }

    public function test_it_transforms_custom_date_from_values()
    {
        $date = new Date('05211986', ['format_from' => 'mdY']);

        $this->assertEquals('1986-05-21', $date->getValue());
    }

    public function test_it_transforms_datetime_to_date()
    {
        $date = new Date('1986-05-21 12:15', ['format_from' => 'Y-m-d H:i']);

        $this->assertEquals('1986-05-21', $date->getValue());
    }
}