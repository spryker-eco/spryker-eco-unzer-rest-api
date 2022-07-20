<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\UnzerRestApi\Dependency\Facade;

use Generated\Shared\Transfer\CheckoutDataTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class UnzerRestApiToUnzerFacadeBridge implements UnzerRestApiToUnzerFacadeInterface
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
