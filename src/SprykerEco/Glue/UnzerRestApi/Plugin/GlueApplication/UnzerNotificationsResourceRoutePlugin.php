<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Plugin\GlueApplication;

use Generated\Shared\Transfer\RestUnzerNotificationsAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;
use SprykerEco\Glue\UnzerRestApi\UnzerRestApiConfig;

class UnzerNotificationsResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @var string
     */
    protected const CONTROLLER_NAME = 'unzer-notifications';

    /**
     * @var string
     */
    protected const ACTION_POST = 'post';

    /**
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection->addPost(static::ACTION_POST, false);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return UnzerRestApiConfig::UNZER_NOTIFICATIONS;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return static::CONTROLLER_NAME;
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestUnzerNotificationsAttributesTransfer::class;
    }
}
