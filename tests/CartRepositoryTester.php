<?php

namespace Saasify\Cart\Tests;

use Saasify\Cart\Coupons\FixedDiscountCoupon;
use Saasify\Cart\Coupons\PercentDiscountCoupon;

trait CartRepositoryTester
{
    use CartTester;

    public function testStoreAndRestore()
    {
        $this->addItemsToCart();

        \Cart::addCoupon(new FixedDiscountCoupon('fixed coupon', 300));
        \Cart::addCoupon(new PercentDiscountCoupon('percent coupon', 0.05));

        \Cart::store(1);
        \Cart::clear();

        $this->assertEquals(0, \Cart::count());

        \Cart::restore(1);

        $this->assertEquals(5, \Cart::count());
        $this->assertEquals(2, \Cart::coupons()->count());
        $this->assertEquals('cart.default', \Cart::currentInstance());
    }
}
