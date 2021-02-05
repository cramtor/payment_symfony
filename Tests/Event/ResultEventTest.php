<?php

/*
 * This file is part of the cramtorPaylineBundle package.
 *
 * (c)Alejandro Macia
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace cramtor\PaylineBundle\Tests\Event;

use cramtor\PaylineBundle\Event\ResultEvent;
use cramtor\PaylineBundle\Payline\PaylineResult;
use PHPUnit\Framework\TestCase;

class ResultEventTest extends TestCase
{
    public function testConstruct()
    {
        $result = new PaylineResult([]);
        $event = new ResultEvent($result);
        self::assertSame($result, $event->getResult());
    }
}
