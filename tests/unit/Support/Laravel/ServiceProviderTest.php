<?php
namespace GuzzleHttp\Profiling\Clockwork\Unit\Support\Laravel;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Profiling\Clockwork\Support\Laravel\ServiceProvider;
use Illuminate\Container\Container;
use PHPUnit_Framework_TestCase;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testAttributes()
    {
        // Arrange
        $app = $this->getMock(Container::class);
        $serviceProvider = new ServiceProvider($app);

        // Act
        $deferred = $serviceProvider->isDeferred();
        $provides = $serviceProvider->provides();

        // Assert
        $this->assertTrue($deferred);
        $this->assertContains(Client::class, $provides);
        $this->assertContains(ClientInterface::class, $provides);
        $this->assertContains(HandlerStack::class, $provides);
    }
}
