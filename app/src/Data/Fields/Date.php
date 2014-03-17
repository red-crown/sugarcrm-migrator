<?php

namespace Fbsg\Data\Fields;


class Date extends Field
{
    protected $defaultOptions = [
        'format_from' => 'm/d/Y',
        'format_to'   => 'Y-m-d'
    ];

    /**
     * @return mixed|string
     * @throws \Exception
     */
    protected function transform()
    {
        try {
            $dt = \DateTime::createFromFormat($this->options['format_from'], $this->rawValue);
            $this->value = $dt->format($this->options['format_to']);
        } catch (\Exception $e) {
            throw new \Exception("Problem creating date value: " . $e->getMessage());
        } finally {
            return $this->value;
        }
    }
}