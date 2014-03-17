<?php

namespace Fbsg\Data\Fields;


class Dropdown extends Field
{
    /**
     * @var string
     */
    protected static $formatterClass = 'Fbsg\Data\Formatters\Dropdown';

    /**
     * @var \Fbsg\Data\Formatters\Formatter;
     */
    protected $formatter;

    /**
     * @var array
     */
    protected $defaultOptions = [
        'wrapper'  => '',
        'mapping'  => [],
        'default'  => '',
        'splitter' => '',
    ];

    /**
     * @var array
     */
    protected $mapping;

    /**
     * @param mixed $rawValue
     * @param array $options
     */
    function __construct($rawValue, array $options = [])
    {
        $this->rawValue  = $rawValue;

        // Instantiate options for the Dropdown field
        $this->options   = $this->setOptions($options);
        // convenient shortcut for accessing the optional "mapping" property
        $this->mapping   = $this->options['mapping'];

        // This is the formatter which helps transform the value into valid dropdown format
        $this->formatter = static::createFormatter($this->options);
        $this->value     = $this->transform();
    }

    /**
     * @return string
     */
    protected function transform()
    {
        $this->value = $this->formatter->format($this->rawValue);

        return $this->value;
    }

    /**
     * @param array $options
     *
     * @return \Fbsg\Data\Formatters\Formatter
     */
    protected static function createFormatter(array $options)
    {
        $formatter = new static::$formatterClass();

        /** @var \Fbsg\Data\Formatters\Formatter $formatter */
        $formatter->setOptions($options);

        return $formatter;
    }
}