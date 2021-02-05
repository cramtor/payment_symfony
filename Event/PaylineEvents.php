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

final class PaylineEvents
{
    /**
     * Triggered just before doWebPayment webservice is called by the Payline gateway.
     * Listeners will receive a \cramtor\PaylineBundle\Event\WebTransactionEvent object.
     *
     * You may use this event to add extra parameters for the webservice.
     */
    const PRE_WEB_TRANSACTION_INITIATE = 'payline.before_web_transaction_initiate';

    /**
     * Triggered after doWebPayment webservice was called by the Payline gateway.
     * Listeners will receive a \cramtor\PaylineBundle\Event\ResultEvent object.
     */
    const POST_WEB_TRANSACTION_INITIATE = 'payline.after_web_transaction_initiate';

    /**
     * Triggered when getting back from Payline website, after the customer has done his payment.
     * Listeners will receive a \cramtor\PaylineBundle\Event\PaymentNotificationEvent object.
     */
    const ON_BACK_TO_SHOP = 'payline.on_back_to_shop';

    /**
     * Triggered when getting a payment notification from Payline.
     * Listeners will receive a \cramtor\PaylineBundle\Event\PaymentNotificationEvent object.
     */
    const ON_NOTIFICATION = 'payline.on_notification';

    /**
     * Triggered just after getWebPaymentDetails webservice was called by the Payline gateway.
     * Listeners will receive a \cramtor\PaylineBundle\Event\ResultEvent object.
     */
    const WEB_TRANSACTION_VERIFY = 'payline.web_transaction_verify';
}
