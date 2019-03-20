<?php
namespace Framework\BearSunday\Resource\App;

use BEAR\Resource\ResourceObject;

final class Greeting extends ResourceObject
{
    public function onGet(string $name = 'BEAR.Sunday'): ResourceObject
    {
        $this->body = [
            'greeting' => 'Hello ' . $name
        ];

        return $this;
    }
}
