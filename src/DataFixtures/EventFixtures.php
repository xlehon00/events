<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class EventFixtures extends Fixture
{
    const EVENTS = [
        'Event A' => [
            'beginAt' => '2020-07-20 8:00',
            'endAt' => '2020-07-20 9:00',
        ],
        'Event B' => [
            'beginAt' => '2020-07-20 9:15',
            'endAt' => '2020-07-20 10:30',
        ],
        'Event C' => [
            'beginAt' => '2020-07-20 10:30',
            'endAt' => '2020-07-20 12:00',
        ],
        'Event D' => [
            'beginAt' => '2020-07-20 11:00',
            'endAt' => '2020-07-20 13:00',
        ],
        'Event E' => [
            'beginAt' => '2020-07-20 13:15',
            'endAt' => '2020-07-20 15:30',
        ],
        'Event F' => [
            'beginAt' => '2020-07-20 14:00',
            'endAt' => '2020-07-20 16:00',
        ],
        'Event G' => [
            'beginAt' => '2020-07-20 15:45',
            'endAt' => '2020-07-20 17:00',
        ],
        'Event H' => [
            'beginAt' => '2020-07-20 17:00',
            'endAt' => '2020-07-20 19:00',
        ],
        'Event I' => [
            'beginAt' => '2020-07-20 17:30',
            'endAt' => '2020-07-20 18:00',
        ],
        'Event K' => [
            'beginAt' => '2020-07-20 18:30',
            'endAt' => '2020-07-20 20:00',
        ],
        'Event L' => [
            'beginAt' => '2020-07-20 20:30',
            'endAt' => '2020-07-20 21:00',
        ],
        'Event M' => [
            'beginAt' => '2020-07-20 20:00',
            'endAt' => '2020-07-20 22:00',
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::EVENTS as $name => $eventSettings) {
            $event = new Event(
                $name,
                new DateTime($eventSettings['beginAt']),
                new DateTime($eventSettings['endAt'])
            );
            $manager->persist($event);
        }

        $manager->flush();
    }
}
