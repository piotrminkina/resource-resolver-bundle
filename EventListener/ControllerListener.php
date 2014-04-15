<?php

namespace PMD\ResourcesResolverBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use PMD\ResourcesResolverBundle\Factory\RequestControllerFactory;

/**
 * Class ControllerListener
 * @package PMD\ResourcesResolverBundle\EventListener
 */
class ControllerListener
{
    /**
     * @var RequestControllerFactory
     */
    protected $factory;

    /**
     * @param RequestControllerFactory $factory
     */
    public function __construct(RequestControllerFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $factory = $this->factory;
        $controller = $event->getController();
        $request = $event->getRequest();

        $factory->setController($controller);
        $factory->setRequest($request);

        $collector = $factory->createCollector();
        $injector = $factory->createInjector();
        $resolver = $factory->createResolver();

        $resolver->resolveAndInject($collector, $injector);
    }
}
