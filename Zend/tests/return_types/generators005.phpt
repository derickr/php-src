--TEST--
Return type covariance works with generators
--FILE--
<?php
interface Collection extends IteratorAggregate {
    function getIterator(): Iterator;
}

class SomeCollection implements Collection {
    function getIterator(): Iterator {
        foreach ($this->data as $key => $value) {
            yield $key => $value;
        }
    }
}

$some = new SomeCollection();
var_dump($some->getIterator());
?>
--EXPECTF--
object(Generator)#%d (%d) {
  ["function"]=>
  string(27) "SomeCollection::getIterator"
}
