<?php

namespace tests\Fbsg\Data\Fields;

use tests\Fbsg\TestCase;
use Fbsg\Data\Fields\DateTime;

class DateTimeTest extends TestCase
{
    protected $overrideOptions = [
        'format_from' => 'm/d/Y H:i:s',
        'format_to'   => 'Y-m-d',
    ];

    protected $timePattern = '\d\d:\d\d:\d\d';

    public function test_it_transforms_default_date_values()
    {
        $date = new DateTime('5/21/1986');

        $this->assertRegExp('/1986-05-21 '.$this->timePattern.'/', $date->getValue());
    }
}
