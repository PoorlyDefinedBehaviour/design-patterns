<?php declare (strict_types = 1);

require_once __DIR__ . "/lists/LinkedList.php";
require_once __DIR__ . "/abstracts/Stack.php";
require_once __DIR__ . "/trees/BinarySearchTree.php";

use \Abstracts\Stack;
use \Lists\LinkedList;
use \Trees\BinarySearchTree;

function binary_search_tree_comparator($lhs, $rhs): int {
  if ($lhs < $rhs) {
    return BinarySearchTree::LESS;
  }

  if ($lhs > $rhs) {
    return BinarySearchTree::GREATER;
  }

  return BinarySearchTree::EQUAL;
}

function print_values(ForwardIterator $iterator) {
  while (!$iterator->done()) {
    echo $iterator->next(), ", ";
  }
  echo "\n";
}

function main(): void {
  $list = new LinkedList();
  $list->insert(1)
    ->insert(2)
    ->insert(3)
    ->insert(4)
    ->insert(5);

  $stack = new Stack();
  $stack->push(1)
    ->push(2)
    ->push(3)
    ->push(4)
    ->push(5);

  $tree = new BinarySearchTree(\Closure::fromCallable("binary_search_tree_comparator"));
  $tree->insert(1)
    ->insert(2)
    ->insert(3)
    ->insert(4)
    ->insert(5);

  print_values($list->to_iterator());
  print_values($stack->to_iterator());
  print_values($tree->to_iterator());
}
main();
