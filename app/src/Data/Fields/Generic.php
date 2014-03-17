<?php

namespace Fbsg\Data\Fields;


class Generic extends Field
{
    /**
     * @return mixed
     */
    protected function transform()
    {
        return $this->rawValue;
    }
}