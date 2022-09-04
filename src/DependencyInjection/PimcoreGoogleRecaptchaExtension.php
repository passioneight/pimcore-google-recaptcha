<?php

namespace Passioneight\PimcoreGoogleRecaptcha\DependencyInjection;

use Passioneight\Bundle\PhpUtilitiesBundle\Service\Utility\MethodUtility;
use Passioneight\PimcoreGoogleRecaptcha\Service\Configuration\GoogleRecaptchaConfiguration;
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
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('config.yml');

        $this->populateContainer($mergedConfig, $container);
    }

    private function populateContainer(array $config, ContainerBuilder $container): void
    {
        $serviceDefinition = $container->getDefinition(GoogleRecaptchaConfiguration::class);
        $serviceDefinition->addMethodCall(MethodUtility::createSetter("configuration"), [$config]);
    }
}
