<?php
namespace Framework\BearSunday\Resource\Page;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    /**
     * @var ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = (new AppInjector('Framework\BearSunday', 'app'))->getInstance(ResourceInterface::class);
    }

    public function testOnGet()
    {
        $ro = $this->resource->get('page://self/index', ['name' => 'BEAR.Sunday']);
        $this->assertSame(200, $ro->code);
        $this->assertSame('Hello BEAR.Sunday', $ro->body['greeting']);
    }
}
