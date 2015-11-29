<?php

namespace Rent;

use InvalidArgumentException;
use DateTime;

class RentalPeriod
{
    private $startDate;
    private $endDate;

    public static function fromDateTime(DateTime $startDate, DateTime $endDate)
    {
        if ($startDate > $endDate) {
            throw new InvalidArgumentException('End date cannot be before start date.');
        }

        $period = new static;
        $period->startDate = $startDate;
        $period->endDate = $endDate;

        return $period;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getHourCount()
    {
        $seconds = $this->endDate->getTimestamp() - $this->startDate->getTimeStamp();
        $minutes = $seconds / 60;
        $hours = (int) $minutes / 60;

        return $hours;
    }
}
