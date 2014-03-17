<?php

namespace tests\Fbsg\Data\Fields;

use tests\Fbsg\TestCase;
use Fbsg\Data\Fields\Id;

class IdTest extends TestCase
{
    public function test_it_creates_an_id_if_none_given()
    {
        $id = new Id("");
        $this->assertTrue(strlen($id->getValue()) == 36);
    }

    public function test_it_can_accept_no_value()
    {
        $id = new Id();
        $this->assertTrue(strlen($id->getValue()) == 36);
    }

}