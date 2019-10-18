<?php
namespace Framework\BearSunday\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\Embed;

class Index extends ResourceObject
{
    /**
     * @Embed(rel="greeting", src="app://self/greeting{?name}")
     * @Embed(rel="weekday", src="app://self/weekday?year=2019&month=04&day=01")
     * @return ResourceObject
     */
    public function onGet(): ResourceObject
    {
        $this->body += [
            'page' => 'index'
        ];

        return $this;
    }
}
