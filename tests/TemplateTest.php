<?

use \PHPUnit\Framework\TestCase;
use \Mockery\Adapter\Phpunit\MockeryTestCase;

class TemplateTest extends MockeryTestCase
{
    /**
     * only needed if not extended
    */
    // public function tearDown(): void 
    // {
    //     Mockery::close();
    // }

    public function testAddReturnsTheCorrectSum()
    {
        $this->assertEquals(4, add(2,2));
    }
}