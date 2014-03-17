<?php

namespace Fbsg\Sync;


use Fbsg\Cache;
use Fbsg\CSV\Writer;
use Fbsg\Data\DataMapper;
use Fbsg\Integration\Sources\Sugar\SugarRest;

class SyncService
{
    /**
     * @var SugarRest
     */
    protected $rest;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var array
     */
    protected $credentials = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $mapping;

    /**
     * @var array[\Fbsg\Data\DataMapper]
     */
    protected $mappers;

    /**
     * @param SugarRest $rest
     * @param Cache     $cache
     */
    function __construct(SugarRest $rest, Cache $cache)
    {
        $this->rest  = $rest;
        $this->cache = $cache;
    }

    public function run($dataAndMap)
    {
        foreach ($dataAndMap as $d) {
            $mapping = $d['mapping'];
            $data    = $d['data'];
            $mapper  = new \Fbsg\Data\DataMapper($mapping);

            $this->throttledSetEntries($mapper->mapAll($data));
        }
    }

    protected function throttledSetEntries(array $data)
    {
        $throttled = 20;
        $total     = 0;
        $offset    = 0;
    }
}