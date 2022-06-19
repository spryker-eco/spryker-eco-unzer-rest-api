<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Plugin\CheckoutRestApi;

use Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Glue\CheckoutRestApiExtension\Dependency\Plugin\CheckoutDataResponseMapperPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class UnzerCheckoutDataResponseMapperPlugin extends AbstractPlugin implements CheckoutDataResponseMapperPluginInterface
{
    /**
     * Specification:
     * - Fills `RestCheckoutDataResponseAttributesTransfer.UnzerPublicKey` property using `UnzerCredentials`, `UnzerKeypair`, `PublicKey` properties of `RestCheckoutDataResponseTransfer`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer $restCheckoutResponseAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer
     */
    public function mapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransfer(
        RestCheckoutDataTransfer $restCheckoutDataTransfer,
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        RestCheckoutDataResponseAttributesTransfer $restCheckoutResponseAttributesTransfer
    ): RestCheckoutDataResponseAttributesTransfer {
        $unzerPublicKey = $restCheckoutDataTransfer->getQuoteOrFail()
            ->getUnzerCredentialsOrFail()
            ->getUnzerKeypairOrFail()
            ->getPublicKeyOrFail();

        return $restCheckoutResponseAttributesTransfer->setUnzerPublicKey($unzerPublicKey);
    }
}
