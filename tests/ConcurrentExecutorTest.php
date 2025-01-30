<?php 

namespace Vendor\ConcurrentLaravel\Tests;

use PHPUnit\Framework\TestCase;
use Vendor\ConcurrentLaravel\ConcurrentExecutor;

class ConcurrentExecutorTest extends TestCase
{
    public function testConcurrentExecution()
    {
        $executor = new ConcurrentExecutor();

        // Sample API requests
        $requests = [
            ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/posts/1'],
            ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/users/1']
        ];

        $responses = $executor->execute($requests);

        // Ensure responses are valid
        $this->assertIsArray($responses);
        $this->assertArrayHasKey(0, $responses);
        $this->assertArrayHasKey(1, $responses);
        $this->assertArrayHasKey('id', $responses[0]);
        $this->assertArrayHasKey('id', $responses[1]);
    }
}
