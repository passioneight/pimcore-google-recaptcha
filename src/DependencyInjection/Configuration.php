<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\DependencyInjection;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Constant\Configuration as Config;
use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Constant\DefaultConfigurationValue;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(Config::ROOT);
        $rootNode = $treeBuilder->getRootNode();

        $this->addGoogleRecaptchaKeyConfiguration($rootNode);
        $this->addGoogleRecaptchaValidationConfiguration($rootNode);
        $this->addMiscConfiguration($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    private function addGoogleRecaptchaKeyConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode(Config::PUBLIC_KEY)
                    ->defaultNull()
                ->end()
                ->scalarNode(Config::PRIVATE_KEY)
                    ->defaultNull()
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    private function addGoogleRecaptchaValidationConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode(Config::SCORE_THRESHOLD)
                    ->defaultValue(DefaultConfigurationValue::SCORE_THRESHOLD)
                ->end()
            ->end();
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    private function addMiscConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->booleanNode(Config::DEBUG)
                    ->defaultValue(\Pimcore::inDebugMode())
                ->end()
                ->scalarNode(Config::TOKEN_DECODER_URL)
                    ->defaultValue(DefaultConfigurationValue::TOKEN_DECODER_URL)
                ->end()
                ->scalarNode(Config::DEFAULT_ACTION)
                    ->defaultValue(DefaultConfigurationValue::DEFAULT_ACTION)
                ->end()
            ->end();
    }
}
