<?php

namespace Fbsg\Data\Fields;


class String extends Field
{
    /**
     * @return string
     */
    protected function transform()
    {
        return (string)$this->rawValue;
    }
}