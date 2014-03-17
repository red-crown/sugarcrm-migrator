<?php

namespace Fbsg\Data\Fields;


abstract class Number extends Field
{
    /**
     * @param mixed $num
     *
     * @return string
     */
    protected function cleanNumber($num)
    {
        return preg_replace('/\$|,/','', $num);
    }
}