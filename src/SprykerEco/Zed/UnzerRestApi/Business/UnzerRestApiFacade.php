<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business;

use Generated\Shared\Transfer\QuoteTransfer;

/**
 * @method \SprykerEco\Zed\UnzerRestApi\Business\UnzerRestApiBusinessFactory getFactory()
 */
class UnzerRestApiFacade implements UnzerRestApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expandQuoteWithUnzerCredentials(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        return $this->getFactory()
            ->createQuoteExpander()
            ->expandQuoteWithUnzerCredentials($quoteTransfer);
    }
}
