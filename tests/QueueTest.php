<?

use \PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    //NOTE test can be depent on other tests doing it this way.
    /**
     * runs when class starts
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }
    
    /**
     * runs when class finishes
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNoItemsInQueue()
    {
        $this->assertEquals(0, static::$queue->getCount());

    }

    public function testItemAddedToQueue()
    {
        static::$queue->push('abc');
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testItemRemovedFromQueue()
    {
        static::$queue->push('abcd');
        $item = static::$queue->pop();
        $this->assertEquals(1, static::$queue->getCount());

        $this->assertEquals('abc', $item);
    }

    public function clear()
    {
        static::$queue = [];
    }

}