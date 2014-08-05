<?php

/*
 * This file is part of the PMD package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\Bundle\Resource\ResolverBundle\Parser;

/**
 * Class ParserChain
 *
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\Bundle\Resource\ResolverBundle\Parser
 */
class ParserChain implements ParserInterface
{
    /**
     * @var ParserInterface[]
     */
    protected $parsers;

    /**
     * @param ParserInterface[] $parsers
     */
    public function __construct(array $parsers)
    {
        $this->parsers = $parsers;
    }

    /**
     * @inheritdoc
     */
    public function parse($definition)
    {
        foreach ($this->parsers as $parser) {
            $definition = $parser->parse($definition);
        }

        return $definition;
    }
}
