<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\EventRepository;
use App\Service\OverlappingEventsCalculate;

class DefaultController extends AbstractController
{
    private EventRepository $eventRepository;

    private OverlappingEventsCalculate $overlappingEventsCalService;

    public function __construct(EventRepository $eventRepository, OverlappingEventsCalculate $overlappingEventsCalService)
    {
        $this->eventRepository = $eventRepository;
        $this->overlappingEventsCalService = $overlappingEventsCalService;
    }

    public function index()
    {
        $from = (new \DateTime('2020-07-20'))->setTime(0, 0);
        $to = (new \DateTime('2020-07-20'))->setTime(23, 59, 59);
        $events = $this->eventRepository->findByInterval($from, $to);
        $overlappingEventsPairs = $this->overlappingEventsCalService->calculate($events);

        return $this->render('events/default.html.twig', [
            'events' => $events,
            'overlappingEventsPairs' => $overlappingEventsPairs
        ]);
    }
}
