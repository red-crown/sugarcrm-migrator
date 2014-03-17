<?php

namespace Fbsg\Data\Fields;


class Integer extends Number
{
    /**
     * @var array
     */
    protected $defaultOptions = [
        'round' => true,
    ];

    /**
     * @return int
     */
    protected function transform()
    {
        $value = $this->cleanNumber($this->rawValue);

        if ($this->options['round']) {

            if ($this->options['round'] === true) {
                $this->options['round'] = 'round';
            }

            switch ($this->options['round']) {
                case 'floor':
                    $value = floor($value);
                    break;

                case 'ceil':
                    $value = ceil($value);
                    break;

                default:
                    $value = round($value);
                    break;
            }
        }

        return intval($value);
    }
}