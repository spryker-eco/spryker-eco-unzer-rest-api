<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutDataTransfer;

class RestCheckoutDataResponseAttributesMapper implements RestCheckoutDataResponseAttributesMapperInterface
{
    /**
     * @param \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataResponseAttributesTransfer $restCheckoutDataResponseAttributesTransfer
     * @param \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataTransfer $restCheckoutDataTransfer
     *
     * @return \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataResponseAttributesTransfer
     */
    public function mapRestCheckoutData(
        RestCheckoutDataResponseAttributesTransfer $restCheckoutDataResponseAttributesTransfer,
        RestCheckoutDataTransfer $restCheckoutDataTransfer
    ): RestCheckoutDataResponseAttributesTransfer {
        $unzerPublicKey = $restCheckoutDataTransfer->getQuoteOrFail()
            ->getUnzerCredentialsOrFail()
            ->getUnzerKeypairOrFail()
            ->getPublicKeyOrFail();
        $restCheckoutDataResponseAttributesTransfer->setUnzerPublicKey($unzerPublicKey);

        return $restCheckoutDataResponseAttributesTransfer;
    }
}
