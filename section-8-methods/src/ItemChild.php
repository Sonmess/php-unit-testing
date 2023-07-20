<?php

class ItemChild extends Item
{
    public function getId() {
        return parent::getId();
    }

    public function getToken()
    {
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($this);
        return $result;
    }
}

?>