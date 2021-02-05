<?php

/*
 * This file is part of the cramtorPaylineBundle package.
 *
 * (c)Alejandro Macia
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace cramtor\PaylineBundle\Tests\DependencyInjection;

use cramtor\PaylineBundle\DependencyInjection\cramtorPaylineExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Payline\PaylineSDK;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class cramtorPaylineExtensionTest extends AbstractExtensionTestCase
{
    /**
     * Return an array of container extensions you need to be registered for each test (usually just the container
     * extension you are testing.
     *
     * @return ExtensionInterface[]
     */
    protected function getContainerExtensions(): array
    {
        return [new cramtorPaylineExtension()];
    }

    /**
     * @dataProvider basicConfigProvider
     */
    public function testBasicConfig($currency, $logLevel = null)
    {
        $merchantId = '123';
        $accessKey = '456xyz789';
        $contractNumber = '1234567';
        $environment = PaylineSDK::ENV_HOMO;
        $confirmationRoute = 'confirmation';
        $errorRoute = 'error';
        $logLevel = $logLevel ?: 'warning';
        $config = [
            'merchant_id' => $merchantId,
            'access_key' => $accessKey,
            'contract_number' => $contractNumber,
            'environment' => $environment,
            'default_confirmation_route' => $confirmationRoute,
            'default_error_route' => $errorRoute,
            'default_currency' => $currency,
            'log_level' => $logLevel,
        ];

        $this->load($config);
        $this->assertContainerBuilderHasParameter('cramtor_payline.merchant_id', $merchantId);
        $this->assertContainerBuilderHasParameter('cramtor_payline.access_key', $accessKey);
        $this->assertContainerBuilderHasParameter('cramtor_payline.default_contract_number', $contractNumber);
        $this->assertContainerBuilderHasParameter(
            'cramtor_payline.default_currency',
            constant('cramtor\PaylineBundle\Payline\WebTransaction::CURRENCY_'.$currency)
        );
        $this->assertContainerBuilderHasParameter('cramtor_payline.environment', $environment);
        $this->assertContainerBuilderHasParameter('cramtor_payline.log_verbosity', constant('Monolog\Logger::'.strtoupper($logLevel)));
        $this->assertContainerBuilderHasParameter('cramtor_payline.default_confirmation_route', $confirmationRoute);
        $this->assertContainerBuilderHasParameter('cramtor_payline.default_error_route', $errorRoute);
        $this->assertContainerBuilderHasParameter('cramtor_payline.proxy.host', null);
        $this->assertContainerBuilderHasParameter('cramtor_payline.proxy.port', null);
        $this->assertContainerBuilderHasParameter('cramtor_payline.proxy.login', null);
        $this->assertContainerBuilderHasParameter('cramtor_payline.proxy.password', null);
    }

    public function basicConfigProvider()
    {
        return [
            ['EUR', null],
            ['EUR', 'info'],
            ['DOLLAR', 'debug'],
            ['CAD', 'notice'],
            ['CHF', 'error'],
            ['POUND', 'emergency'],
        ];
    }
}
