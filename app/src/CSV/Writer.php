<?php

namespace Fbsg\CSV;


use EasyCSV\Writer as CSVWriter;
use EasyCSV\Reader as CSVReader;

class Writer
{
    /**
     * @var string
     */
    private $outputFile;

    /**
     * @var string
     */
    private $inputFile;

    /**
     * @param string $inputFile
     * @param string $outputFile
     */
    function __construct($inputFile = '', $outputFile = '')
    {
        $this->inputFile  = $inputFile;
        $this->outputFile = $outputFile;
    }

    /**
     * @param string $filename
     * @param int    $row
     *
     * @return array|bool
     */
    public function read($filename = null, $row = null)
    {
        if (is_null($filename)) {
            $filename = $this->inputFile;
        }

        if (!file_exists($filename)) {
            throw new \Exception("The file $filename cannot be found");
        }

        if (!is_readable($filename)) {
            throw new \Exception("The file $filename cannot be read");
        }

        $reader = new CSVReader($filename);
        $reader->setDelimiter(",");
        $reader->setEnclosure('"');

        if (is_int($row)) {
            return $reader->getRow($row);
        } else {
            return $reader->getAll();
        }
    }

    /**
     * @param array  $data
     * @param string $filename
     */
    public function write(array $data, $filename = null)
    {
        if (is_null($filename)) {
            $filename = $this->outputFile;
        }

        $writer = new CSVWriter($filename);

        $writer->writeRow(array_keys($data[0]));
        $writer->writeFromArray($data);
    }

    /**
     * @return string
     */
    public function getOutputFile()
    {
        return $this->outputFile;
    }

    /**
     * @param string $outputFile
     */
    public function setOutputFile($outputFile)
    {
        $this->outputFile = $outputFile;
    }

    /**
     * @return string
     */
    public function getInputFile()
    {
        return $this->inputFile;
    }

    /**
     * @param string $inputFile
     */
    public function setInputFile($inputFile)
    {
        $this->inputFile = $inputFile;
    }
}