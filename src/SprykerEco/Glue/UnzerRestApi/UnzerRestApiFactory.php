<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi;

use Spryker\Glue\Kernel\AbstractFactory;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface;
use SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapper;
use SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapperInterface;
use SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessor;
use SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessorInterface;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiConfig getConfig()
 */
class UnzerRestApiFactory extends AbstractFactory
{
    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessorInterface
     */
    public function createUnzerNotificationProcessor(): UnzerNotificationProcessorInterface
    {
        return new UnzerNotificationProcessor(
            $this->createUnzerNotificationMapper(),
            $this->getUnzerClient(),
            $this->getResourceBuilder()
        );
    }

    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\UnzerNotificationMapperInterface
     */
    public function createUnzerNotificationMapper(): UnzerNotificationMapperInterface
    {
        return new UnzerNotificationMapper();
    }

    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface
     */
    public function getUnzerClient(): UnzerRestApiToUnzerClientInterface
    {
        return $this->getProvidedDependency(UnzerRestApiDependencyProvider::CLIENT_UNZER);
    }
}
