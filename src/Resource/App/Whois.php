<?php
namespace Framework\BearSunday\Resource\App;

use BEAR\Resource\ResourceObject;
use Chanshige\WhoisInterface;

/**
 * Class Whois
 *
 * @package Framework\BearSunday\Resource\App
 */
class Whois extends ResourceObject
{
    private $whois;

    public function __construct(WhoisInterface $whois)
    {
        $this->whois = $whois;
    }

    /**
     * @param string $domain
     * @param string $servername
     * @return ResourceObject
     */
    public function onGet(string $domain, string $servername = ''): ResourceObject
    {
        $res = $this->whois->query($domain, $servername);

        $this->body = [
            'result' => $res->results()
        ];

        return $this;
    }
}
