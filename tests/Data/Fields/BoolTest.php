<?php

namespace tests\Fbsg\Data\Fields;

use tests\Fbsg\TestCase;
use Fbsg\Data\Fields\Bool;

class BoolTest extends TestCase
{
    public function test_it_transforms_yes_or_no()
    {
        $bool1 = new Bool("Yes");
        $bool2 = new Bool("No");

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }

    public function test_it_transforms_yes_or_no_with_mixed_case()
    {
        $bool1 = new Bool("yes");
        $bool2 = new Bool("no");

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }

    public function test_it_transforms_string_true_or_false()
    {
        $bool1 = new Bool("True");
        $bool2 = new Bool("False");

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }

    public function test_it_transforms_string_true_or_false_with_mixed_case()
    {
        $bool1 = new Bool("truE");
        $bool2 = new Bool("FALSE");

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }

    public function test_it_transforms_literal_true_or_false()
    {
        $bool1 = new Bool(true);
        $bool2 = new Bool(false);

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }

    public function test_it_transforms_0_or_1()
    {
        $bool1 = new Bool(1);
        $bool2 = new Bool(0);

        $this->assertEquals(1, $bool1->getValue());
        $this->assertEquals(0, $bool2->getValue());
    }
}