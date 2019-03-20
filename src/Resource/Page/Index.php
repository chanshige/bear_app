<?php
namespace Framework\BearSunday\Resource\Page;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    /**
     * @\BEAR\Resource\Annotation\Embed(rel="greeting", src="app://self/greeting")
     * @\BEAR\Resource\Annotation\Embed(rel="weekday", src="app://self/weekday?year=2019&month=04&day=01")
     */
    public function onGet(): ResourceObject
    {
        return $this;
    }
}
