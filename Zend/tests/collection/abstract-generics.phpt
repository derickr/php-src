--TEST--
Test syntax for abstract generics
---FILE--
<?php
abstract class Library<Inventory, Mgr> {
  private Mgr $mgr;
  public function add(Inventory $item) {}
  public function setManager(Mgr $mgr) { $this->mgr = $mgr; }
}

class BookLibrary extends Library <Book as Inventory, Employee as Mgr> {}

$lib = new BookLibrary();

function findBooks(BookLibrary $lib) {}

function findFromLib(Library $lib) {}
?>
--EXPECT--
