<?php

namespace Fbsg;


/**
 * Class Cache
 *
 * @package Fbsg
 */
class Cache
{
    /**
     * @var array
     */
    protected static $caches = [];

    /**
     * @var CSV\Writer
     */
    private $csv;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    private $id;

    /**
     * @param string $name
     * @param array  $data
     */
    function __construct($name = 'csv-dump', array $data)
    {
        $this->data = $data;
        $this->id   = (string)time();
        $this->csv  = new CsV\Writer();
    }

    function __destruct()
    {
        $this->save();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * @param array $where
     *
     * @return array
     */
    public function getWhere(array $where)
    {
        foreach ($this->data as $row) {
            $found = true;
            foreach ($where as $key => $value) {
                if ($row[$key] != $value) {
                    $found = false;
                    break;
                }
            }

            if ($found) {
                return $row;
            }
        }

        return null;
    }

    public function save()
    {
        $this->csv->write($this->data, $this->buildOutputFilename());
    }

    /**
     * @return string
     */
    protected function buildOutputFilename()
    {
        return $this->buildFilename($this->outputFile . '-' . $this->id);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected function buildFilename($name)
    {
        return resource_path() . '/' . $name . '.csv';
    }

    /**
     * @param string $name
     * @param array  $data
     *
     * @return $this
     */
    public static function make($name, array $data)
    {
        static::$caches[$name] = new self($name, $data);

        return static::$caches[$name];
    }
}