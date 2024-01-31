<?

use \PHPUnit\Framework\TestCase;

class QueueSetupTest extends TestCase
{
    protected $queue;

    /**
     * runs before each test
     */
    protected function setup(): void
    {
        $this->queue = new Queue;
    }
    
    /**
     * runs after each test
     */
    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNoItemsInQueue()
    {
        $this->assertEquals(0, $this->queue->getCount());

    }

    public function testItemAddedToQueue()
    {
        $this->queue->push('abc');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testItemRemovedFromQueue()
    {
        $this->queue->push('abc');
        $this->queue->push('abcd');
        $item = $this->queue->pop();
        $this->assertEquals(1, $this->queue->getCount());

        $this->assertEquals('abc', $item);
    }

    public function testMaxNumberOfItemsAdded()
    {
        for($i = 0; $i < Queue::MAX_ITEMS; $i++){
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testMaxNumberOfItemsAddedFull()
    {
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        
        for($i = 0; $i < Queue::MAX_ITEMS + 1; $i++){
            $this->queue->push($i);
        }

    }

}