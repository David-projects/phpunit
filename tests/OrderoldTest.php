<?

use \PHPUnit\Framework\TestCase;
use \Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderoldTest extends MockeryTestCase
{
    public function testProcessGateway()
    {
        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);


        $order = new Orderold($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
        //$this->assertTrue(true);

    }
}