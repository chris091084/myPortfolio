<?php

namespace App\Subscriber;

use App\Entity\Project;
use App\Services\UploadService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class PostImageSubscriber implements EventSubscriberInterface
{
    private $imagesService;

    public function __construct(UploadService $imagesService)
    {
        $this->imagesService = $imagesService;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('postImage'),
        );
    }

    function postImage(GenericEvent $event) {
        $result = $event->getSubject();
        $method = $event->getArgument('request')->getMethod();

        if (! $result instanceof Project || $method !== Request::METHOD_POST) {
            return;
        }

        if ($result->getLinkUrl() instanceof UploadedFile) {
            $url = $this->imagesService->saveToDisk($result->getScreenShoot());
            $result->setScreenShoot($url);
        }
    }
}