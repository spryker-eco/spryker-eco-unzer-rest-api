<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerEco\Zed\UnzerRestApi\Business\Expander\QuoteExpander;
use SprykerEco\Zed\UnzerRestApi\Business\Expander\QuoteExpanderInterface;
use SprykerEco\Zed\UnzerRestApi\UnzerRestApiDependencyProvider;

/**
 * @method \Spryker\Zed\UnzerRestApi\UnzerRestApiConfig getConfig()
 */
class UnzerRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerEco\Zed\UnzerRestApi\Business\QuoteExpanderInterface
     */
    public function createQuoteExpander(): QuoteExpanderInterface
    {
        return new QuoteExpander(
            $this->getUnzerFacade(),
        );
    }

    /**
     * @return \Spryker\Zed\SalesOrderThresholdsRestApi\Dependency\Facade\SalesOrderThresholdsRestApiToSalesOrderThresholdFacadeInterface
     */
    public function getUnzerFacade(): SalesOrderThresholdsRestApiToSalesOrderThresholdFacadeInterface
    {
        return $this->getProvidedDependency(UnzerRestApiDependencyProvider::FACADE_UNZER);
    }
}
