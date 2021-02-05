<?php

/*
 * This file is part of the cramtorPaylineBundle package.
 *
 * (c)Alejandro Macia
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace cramtor\PaylineBundle\Event;

use cramtor\PaylineBundle\Payline\WebTransaction;
use Symfony\Contracts\EventDispatcher\Event;

class WebTransactionEvent extends Event
{
    /**
     * @var WebTransaction
     */
    private $transaction;

    public function __construct(WebTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return WebTransaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }
}
