<?php
declare(strict_types=1);

namespace App\Service;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Event;

class OverlappingEventsCalculate
{
    /**
     * @param array $events
     * @return array
     */
    public function calculate(array $events)
    {
        $overlappingPairs = array();
        $eventsCnt = count($events);
        for ($i = 0; $i < $eventsCnt; $i++) {
            for ($j = $i+1; $j < $eventsCnt; $j++) {
                if ($pairs = $this->getEventsOverlapping($events[$i], $events[$j])) {
                    $overlappingPairs[] = $pairs;
                }
            }
        }
        return $overlappingPairs;
    }

    /**
     * @param Event $firstEvent
     * @param Event $secondEvent
     * @return array|null
     */
    private function getEventsOverlapping(Event $firstEvent, Event $secondEvent)
    {
        if ($firstEvent->getBeginAt() < $secondEvent->getEndAt() && $firstEvent->getEndAt() > $secondEvent->getBeginAt()) {
            return [
                'firstEvent' => $firstEvent->getName(),
                'secondEvent' => $secondEvent->getName()
            ];
        }
        return null;
    }
}
