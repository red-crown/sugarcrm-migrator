<?php

namespace Fbsg\Data\Fields;


class Float extends Number
{
    /**
     * @return mixed
     */
    protected function transform()
    {
        return floatval($this->cleanNumber($this->rawValue));
    }
}