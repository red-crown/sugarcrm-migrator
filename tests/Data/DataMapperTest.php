<?php

namespace tests\Fbsg\Data;

use Fbsg\Data\DataMapper;
use tests\Fbsg\TestCase;

class DataMapperTest extends TestCase
{
    protected $mapping = [
        'Column1' => [
            'target' => 'column_1'
        ]
    ];

    protected $data = [
        ['Column1' => 'Testing Value 1'],
        ['Column1' => 'Testing Value 2'],
        ['Column1' => 'Testing Value 3'],
    ];

    /**
     * @var DataMapper
     */
    protected $datamapper;

    protected function setup()
    {
        $this->datamapper = new DataMapper($this->mapping);
    }

    public function test_it_maps_row()
    {
        $result = $this->datamapper->map($this->data[0]);

        $this->assertArrayHasKey('column_1', $result);
        $this->assertEquals('Testing Value 1', $result['column_1']);
    }

    public function test_it_maps_all_rows()
    {
        $result = $this->datamapper->mapAll($this->data);

        $this->assertArrayHasKey('column_1', $result[0]);
        $this->assertArrayHasKey('column_1', $result[1]);

        $this->assertEquals('Testing Value 1', $result[0]['column_1']);
        $this->assertEquals('Testing Value 2', $result[1]['column_1']);
    }
}