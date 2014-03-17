<?php

namespace Fbsg\Data\Fields;


use Rhumsaa\Uuid\Uuid;

/**
 * Class Id
 *
 * @package Fbsg\Data\Fields
 */
class Id extends Field
{
    /**
     * @return mixed
     */
    protected function transform()
    {
        if (empty($this->rawValue)) {
            $this->value = Uuid::uuid4();
        }

        return trim($this->value);
    }
}