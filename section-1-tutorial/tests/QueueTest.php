<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected static $newQueue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public static function setUpBeforeClass(): void
    {
        static::$newQueue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        self::$newQueue->clear();
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAddItemToQueue()
    {
        $this->queue->push('Bulba');
        $this->assertEquals(1, $this->queue->getCount());
        return $this->queue;
    }

    /**
     * @depends testAddItemToQueue
     */
    public function testItemIsRemovedFromQueue(Queue $queue)
    {
        $queue->pop();
        $this->assertEquals(0, $queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('First');
        $this->queue->push('Second');
        $this->assertEquals('First', $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Max number of items exceeded');
        $this->queue->push('Test');
    }
}

?>