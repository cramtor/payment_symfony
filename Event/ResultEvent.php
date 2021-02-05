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

use cramtor\PaylineBundle\Payline\PaylineResult;
use Symfony\Contracts\EventDispatcher\Event;

class ResultEvent extends Event
{
    /**
     * @var PaylineResult
     */
    private $result;

    public function __construct(PaylineResult $result)
    {
        $this->result = $result;
    }

    /**
     * @return PaylineResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
