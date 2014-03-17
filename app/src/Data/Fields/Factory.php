<?php

namespace Fbsg\Data\Fields;


class Factory
{
    /**
     * @param string $fieldType
     * @param mixed  $value
     * @param array  $options
     *
     * @return Date|DateTime|Dropdown|Float|Integer|MultiDropdown|String
     * @throws \Exception
     */
    public function make($fieldType, $value, array $options = [])
    {
        switch ($fieldType) {
            case 'Date':
                return new Date($value, $options);

            case 'DateTime':
                return new DateTime($value, $options);

            case 'String':
                return new String($value, $options);

            case 'URL':
                return new String($value, $options);

            case 'Bool':
            case 'Boolean':
                return new Bool($value, $options);

            case 'Integer':
            case 'Int':
                return new Integer($value, $options);

            case 'Float':
                return new Float($value, $options);

            case 'Dropdown':
                return new Dropdown($value, $options);

            case 'MultiDropdown':
                return new MultiDropdown($value, $options);

            case 'Id':
                return new Id($value, $options);

            case '':
                return new Generic($value, $options);

            default:
                throw new \Exception("The type '$fieldType' is not a valid field type");
        }
    }
}