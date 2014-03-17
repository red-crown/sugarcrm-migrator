<?php


namespace Fbsg\Data\Formatters;


/**
 * Class Dropdown
 *
 * @package Fbsg\Data\Formatters
 */
class Dropdown extends Formatter
{
    /**
     * @param $value
     *
     * @return mixed|void
     */
    public function format($value)
    {
        return $this->getMappedValue(trim($value));
    }

    /**
     * @param  mixed $rawValue
     * @return string
     */
    protected function getMappedValue($rawValue)
    {
        $rawValue = trim(ucwords($rawValue));
        $mapping  = $this->options['mapping'];

        if (is_array($mapping)) {
            if (!empty($mapping[$rawValue])) {
                $ret = $mapping[$rawValue];
            } else if (!empty($this->options['default'])) {
                $ret = $this->options['default'];
            } else {
                $ret = $rawValue;
            }
        } else {
            $ret = $rawValue;
        }

        return $ret;
    }
}