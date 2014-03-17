<?php

namespace Fbsg\Data\Fields;


class Bool extends Field
{
    /**
     * @return mixed
     */
    protected function transform()
    {
        switch (strtolower($this->rawValue)) {
            case 'yes':
            case 'true':
                return 1;

            case 'no':
            case 'false':
                return 0;

            default:
                return (int)(bool)($this->rawValue);
        }
    }
}