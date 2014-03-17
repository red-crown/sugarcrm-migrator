<?php

namespace tests\Fbsg\Data\Fields;

use tests\Fbsg\TestCase;
use Fbsg\Data\Fields\Integer;

class IntegerTest extends TestCase
{
    public function test_it_removes_unnecessary_formatting()
    {
        $int1 = new Integer("2,345");
        $int2 = new Integer("2,345.000");

        $this->assertEquals(2345, $int1->getValue());
        $this->assertEquals(2345, $int2->getValue());
    }

    public function test_it_rounds_floats_by_default()
    {
        $int1 = new Integer("2,345.678");
        $this->assertEquals(2346, $int1->getValue());
    }

    public function test_it_can_floor_floats()
    {
        $int1 = new Integer("2,345.678", ['round' => 'floor']);
        $this->assertEquals(2345, $int1->getValue());
    }

    public function test_it_can_ceil_floats()
    {
        $int1 = new Integer("2,345.178", ['round' => 'ceil']);
        $this->assertEquals(2346, $int1->getValue());
    }

    public function test_it_can_cutoff_floats()
    {
        $int1 = new Integer("2,345.6879", ['round' => false]);
        $this->assertEquals(2345, $int1->getValue());
    }
}