<?php

require './src/RecursiveArrayObject.php';

use \RecursiveArrayObject as JSObject;

$test = [
    'a' => [
        'foo' => 42,
        'bar' => [
            'tyk', 'myk'
        ]
    ]
];

$q = new JSObject($test);
$p = new ArrayObject($test, ArrayObject::ARRAY_AS_PROPS);

print_r($q->a->foo);
print_r($q->a->bar);
/**
 *
42
RecursiveArrayObject Object
(
    [storage:ArrayObject:private] => Array
        (
            [0] => tyk
            [1] => myk
        )

)
 */


print_r($p->a->foo);
print_r($p->a->bar);
/**
 *
PHP Notice:  Trying to get property of non-object
PHP Notice:  Trying to get property of non-object
 */


die;