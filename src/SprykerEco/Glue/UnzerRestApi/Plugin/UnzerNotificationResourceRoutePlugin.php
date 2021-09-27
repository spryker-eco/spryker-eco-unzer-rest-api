<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Plugin;

use Generated\Shared\Transfer\RestUnzerNotificationAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;
use SprykerEco\Glue\UnzerRestApi\UnzerRestApiConfig;

class UnzerNotificationResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @var string
     */
    private const CONTROLLER_NAME = 'unzer-notification';
    /**
     * @var string
     */
    private const ACTION_POST = 'post';

    /**
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection->addPost(self::ACTION_POST, false);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return UnzerRestApiConfig::UNZER_NOTIFICATION;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestUnzerNotificationAttributesTransfer::class;
    }
}
