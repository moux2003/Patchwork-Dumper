<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\DebugBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * DebugExtension configuration structure.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('debug');

        $rootNode
            ->children()
                ->integerNode('max_items')
                    ->info('Max number of displayed items past the first level, -1 means no limit')
                    ->min(-1)
                    ->defaultValue(2500)
                ->end()
                ->integerNode('max_string_length')
                    ->info('Max length of displayed strings, -1 means no limit')
                    ->min(-1)
                    ->defaultValue(-1)
                ->end()
                ->scalarNode('profiler_template')
                    ->info('The template used for theming the debub panel in the profiler')
                    ->defaultValue('@Debug/Profiler/Patchwork/debug.html.twig')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
