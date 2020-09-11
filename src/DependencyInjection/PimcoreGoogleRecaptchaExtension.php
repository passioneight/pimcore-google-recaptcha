<?php

namespace Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\DependencyInjection;

use Passioneight\Bundle\PimcoreGoogleRecaptchaBundle\Constant\Configuration as Config;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class PimcoreGoogleRecaptchaExtension extends ConfigurableExtension
{
    /**
     * @inheritDoc
     * @throws \Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('config.yml');

        $this->populateContainer($mergedConfig, $container);
    }

    /**
     * Populates the container in order to access the configuration later on, if needed.
     * @param array $config
     * @param ContainerBuilder $container
     */
    private function populateContainer(array $config, ContainerBuilder $container)
    {
        $container->setParameter(Config::ROOT, $config);
    }
}
