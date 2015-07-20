<?php

namespace DHensen\BuzzAdditions\Test\Listener;

use Buzz\Message;
use DHensen\BuzzAdditions\Listener\BearerAuthListener;

class BearerAuthListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testBearerAuthListener()
    {
        $request = new Message\Request();
        $this->assertEmpty($request->getHeader('Authorization'));

        $listener = new BearerAuthListener('superSecretAccessTokenGeneratedByTheNsaItself');
        $listener->preSend($request);

        $this->assertEquals('Bearer superSecretAccessTokenGeneratedByTheNsaItself', $request->getHeader('Authorization'));
    }
}
