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
}