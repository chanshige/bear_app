<?php
namespace Framework\BearSunday\Resource\App;

use BEAR\Resource\ResourceObject;

/**
 * Class Weekday
 *
 * @package Framework\BearSunday\Resource\App
 */
final class Weekday extends ResourceObject
{
    /**
     * Get.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @return ResourceObject
     */
    public function onGet(int $year, int $month, int $day): ResourceObject
    {
        $dateTime = \DateTimeImmutable::createFromFormat('Y-m-d', "{$year}-{$month}-{$day}");
        $this->body = [
            'input' => $dateTime->format('Y-m-d'),
            'weekday' => $dateTime->format('l')
        ];

        return $this;
    }
}
