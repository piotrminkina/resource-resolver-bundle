<?php

namespace PMD\ResourcesResolverBundle\Collector\Decorator;

use Symfony\Component\HttpFoundation\Request;
use PMD\ResourcesResolverBundle\Collector\CollectorInterface;

/**
 * Class AbstractRequestDecorator
 * @package PMD\ResourcesResolverBundle\Collector\Decorator
 */
abstract class AbstractRequestDecorator extends AbstractDecorator
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @param CollectorInterface $collector
     * @param Request $request
     */
    public function __construct(CollectorInterface $collector, Request $request)
    {
        parent::__construct($collector);

        $this->request = $request;
    }
}
