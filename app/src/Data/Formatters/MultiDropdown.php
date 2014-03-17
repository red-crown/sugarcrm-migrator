<?php

namespace Fbsg\Data\Formatters;


class MultiDropdown extends Dropdown
{
    /**
     * @param $value
     *
     * @return string
     */
    public function format($value)
    {
        $w = $this->getOption('wrapper');

        $parts = array_map(
            function ($part) {
                return $this->getMappedValue(trim($part));
            },
            explode($this->getOption('separator'), $value)
        );

        return $w . implode("{$w},{$w}", $parts) . $w;
    }
}