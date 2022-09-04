<?php

namespace Passioneight\PimcoreGoogleRecaptcha\DependencyInjection;

use Passioneight\PimcoreGoogleRecaptcha\Constant\Configuration as Config;
use Passioneight\PimcoreGoogleRecaptcha\Constant\DefaultConfigurationValue;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(Config::ROOT);
        $rootNode = $treeBuilder->getRootNode();

        $this->addGoogleRecaptchaKeyConfiguration($rootNode);
        $this->addGoogleRecaptchaValidationConfiguration($rootNode);
        $this->addMiscConfiguration($rootNode);

        return $treeBuilder;
    }

    private function addGoogleRecaptchaKeyConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode(Config::PUBLIC_KEY)
                    ->isRequired()
                ->end()
                ->scalarNode(Config::PRIVATE_KEY)
                    ->isRequired()
                ->end()
            ->end();
    }

    private function addGoogleRecaptchaValidationConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode(Config::SCORE_THRESHOLD)
                    ->defaultValue(DefaultConfigurationValue::SCORE_THRESHOLD)
                ->end()
            ->end();
    }

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
