<?php

namespace Fbsg\Data\Fields;


abstract class Field
{
    /**
     * @var array
     */
    protected $defaultOptions = [];

    /**
     * @var array
     */
    protected $options;

    /**
     * @var mixed
     */
    protected $rawValue;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $rawValue
     * @param array $options
     */
    function __construct($rawValue = "", array $options = [])
    {
        $this->rawValue = $rawValue;
        $this->options  = $this->setOptions($options);

        $this->value = $this->transform();
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getOption($key)
    {
        return (isset($this->options[$key])) ? $this->options[$key] : null;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    protected abstract function transform();

    /**
     * @param array $options
     *
     * @return array
     */
    public function setOptions(array $options)
    {
        $this->extendOptions();
        return array_merge($this->defaultOptions, $options);
    }

    protected function extendOptions()
    {
    }
}