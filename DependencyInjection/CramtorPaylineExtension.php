<?php

/*
 * This file is part of the cramtorPaylineBundle package.
 *
 * (c)Alejandro Macia
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace cramtor\PaylineBundle\DependencyInjection;

use cramtor\PaylineBundle\Payline\WebTransaction;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class cramtorPaylineExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // PaylineSDK config
        $container->setParameter('cramtor_payline.merchant_id', $config['merchant_id']);
        $container->setParameter('cramtor_payline.access_key', $config['access_key']);
        $container->setParameter('cramtor_payline.default_contract_number', $config['contract_number']);
        $container->setParameter(
            'cramtor_payline.default_currency',
            constant(WebTransaction::class.'::CURRENCY_'.$config['default_currency'])
        );
        $container->setParameter('cramtor_payline.environment', $config['environment']);
        $container->setParameter('cramtor_payline.log_verbosity', constant('Monolog\Logger::'.strtoupper($config['log_level'])));

        // Proxy config for PaylineSDK
        foreach ($config['proxy'] as $key => $value) {
            $container->setParameter("cramtor_payline.proxy.$key", $value);
        }

        // Default routes
        $container->setParameter('cramtor_payline.default_confirmation_route', $config['default_confirmation_route']);
        $container->setParameter('cramtor_payline.default_error_route', $config['default_error_route']);
    }
}
