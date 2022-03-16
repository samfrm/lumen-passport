<?php

namespace Samfrm\LumenPassport\Tests;

use Samfrm\LumenPassport\Http\Controllers\AccessTokenController;
use Samfrm\LumenPassport\LumenPassport;
use Carbon\Carbon;
use Laravel\Passport\Passport;
use Laravel\Passport\PassportServiceProvider;

/**
 * Class IntegrationTest
 * @package Samfrm\LumenPassport\Tests
 */
class IntegrationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function token_ttl_can_be_set_via_lumen_class()
    {
        // Default (global) client
        LumenPassport::tokensExpireIn(Carbon::now()->addYears(1));
        $tokenExpiresIn = (new \DateTime())
            ->setTimeStamp(0)
            ->add(Passport::personalAccessTokensExpireIn())
            ->getTimeStamp()
        ;
        $this->assertTrue($tokenExpiresIn == Carbon::now()->setTimestamp(0)->addYears(1)->getTimestamp());
    }
}