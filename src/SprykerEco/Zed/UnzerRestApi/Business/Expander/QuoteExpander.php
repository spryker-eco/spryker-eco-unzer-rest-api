<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business\Expander;

use SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface;

class QuoteExpander implements QuoteExpanderInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface
     */
    protected $unzerFacade;

    /**
     * @param \SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface $unzerFacade
     */
    public function __construct(UnzerRestApiToUnzerFacadeInterface $unzerFacade)
    {
        $this->unzerFacade = $unzerFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expandQuoteWithUnzerCredentials(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        return $this->unzerFacade->expandQuoteWithUnzerCredentials($quoteTransfer);
    }
}
