<?

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User();
        $user->first_name = 'David';
        $user->surname = 'John';

        $this->assertEquals('David John', $user->getFullName());
    }

    public function testReturnsEmptyString()
    {
        $user = new User();
        $user->first_name = '';
        $user->surname = '';

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSend()
    {
        $user = new User;
        $mock = $this->createMock(Mailer::class);

        $mock->expects($this->once())
            ->method('sendmessage')
            ->with($this->equalTo('test@test.com'),$this->equalTo('hello'))
            ->willreturn(true);

        $user->setMailer($mock);
        $user->email = 'test@test.com';

        $result = $user->notify('hello');

        $this->assertTrue($result);
    }

    /**
     * @expectedException Exception
     */
    // public function testNotificationThrowException()
    // {
    //     $user = new User;
    //     $mock = $this->getMockBuilder(Mailer::class)
    //         ->onlyMethods(['sendMessage'])
    //         ->getMock();

    //     $mock->expects($this->once())
    //         ->method('sendmessage')
    //         ->with($this->throwException(new Exception));

    //     $this->expectException(Exception::class);

    //     $user->setMailer($mock);
    //     $result = $user->notify('hello');
    // }
}