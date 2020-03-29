<?php

use doganoo\DataObject\Enum\Enum;
use doganoo\DataObject\String\StringClass;

include 'vendor/autoload.php';

class MyEnum extends Enum {

    function getValues(): array {
        return [
            new doganoo\DataObject\Integer\Integer(1)
            , new StringClass("test")
        ];
    }

}

$myEnum = new MyEnum(new StringClass("test"));