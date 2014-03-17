<?php

namespace Fbsg\Data;


/**
 * Class DataMapper
 *
 * @package Fbsg\Data
 */
class DataMapper
{
    /**
     * @var array
     */
    protected $mapping;

    /**
     * @var Fields\Factory
     */
    protected $fieldFactory;

    /**
     * @param array $mapping
     */
    function __construct(array $mapping)
    {
        $this->mapping      = $mapping;
        $this->fieldFactory = new Fields\Factory();
    }

    /**
     * @param array $rows
     *
     * @return array
     */
    public function mapAll(array $rows)
    {
        return array_map([$this, 'map'], $rows);
    }

    /**
     * @param array $row
     *
     * @return array
     */
    public function map(array $row)
    {
        $ret = [];
        foreach ($this->mapping as $key => $def) {
            if (is_array($def)) {

                $target    = isset($def['target']) ? $def['target'] : $key;
                $fieldType = isset($def['type'])   ? $def['type']   : '';

                if (array_key_exists('value', $def)) {
                    $rawValue = $def['value'];
                } else {
                    if (array_key_exists($key, $row)) {
                        $rawValue = $row[$key];
                    } else {
                        $rawValue = '';
                    }
                }

                /** @var array $params */
                $params = (isset($def['params']) and is_array($def['params'])) ? $def['params'] : [];
                $field  = $this->fieldFactory->make($fieldType, $rawValue, $params);

                $ret[$target] = $field->getValue();
            } else {

                $ret[$def] = isset($row[$def]) ? $row[$def] : '';
            }

            $target    = null;
            $fieldType = null;
            $rawValue  = null;
            $params    = null;
            $field     = null;
        }

        return $ret;
    }
}