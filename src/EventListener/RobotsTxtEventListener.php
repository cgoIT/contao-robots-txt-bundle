<?php

declare(strict_types=1);

/*
 * This file is part of cgoit\contao-robots-txt-bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, cgoIT
 * @author     cgoIT <https://cgo-it.de>
 * @license    LGPL-3.0-or-later
 */

namespace Cgoit\RobotsTxtBundle\EventListener;

use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Event\RobotsTxtEvent;
use Contao\CoreBundle\Routing\PageFinder;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use webignition\RobotsTxt\Directive\Directive;
use webignition\RobotsTxt\Directive\UserAgentDirective;
use webignition\RobotsTxt\File\Parser;
use webignition\RobotsTxt\Inspector\Inspector;
use webignition\RobotsTxt\Record\Record;

#[AsEventListener(ContaoCoreEvents::ROBOTS_TXT, priority: 999)]
class RobotsTxtEventListener
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly PageFinder   $pageFinder,
    ) {
    }

    public function __invoke(RobotsTxtEvent $event): void
    {
        $rootPage = $this->pageFinder->findRootPageForHostAndLanguage($this->requestStack->getCurrentRequest()->getHost());

        if (!$rootPage) {
            throw new NotFoundHttpException();
        }

        if (!empty($rootPage->useExternalRobotsConfig)) {
            $parser = new Parser();
            $parser->setSource(file_get_contents($rootPage->externalRobotsConfigUrl));

            $originalFile = $event->getFile();
            $inspector = new Inspector($originalFile);

            foreach ($parser->getFile()->getRecords() as $record) {
                $originalFile->addRecord($record);
            }
        }
    }
}
