<?

use \PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendmessage')->willreturn(true);

        $result = $mock->sendMessage('email:email.com', 'hello');

        $this->assertTrue($result);
 
    }
}