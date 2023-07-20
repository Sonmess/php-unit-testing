<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('identifier');
        $property->setAccessible(true);
        $value = $property->getValue($product);

        var_dump($product);
        $this->assertIsInt($value);
    }
}

?>