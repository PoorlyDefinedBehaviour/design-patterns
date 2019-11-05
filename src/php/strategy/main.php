<?php declare (strict_types = 1);

require_once __DIR__ . "/strategies/BubbleSortStrategy.php";
require_once __DIR__ . "/strategies/QuickSortStrategy.php";
require_once __DIR__ . "/queue/NaivePriorityQueue.php";

function show_queue_elements($queue): void {
  while (!$queue->is_empty()) {
    echo $queue->next(), ' ';
  }
}

function main(): void {
  $queue_bubble_sort_strategy = new NaivePriorityQueue(new BubbleSortStrategy());
  $queue_bubble_sort_strategy->push(5)
    ->push(4)
    ->push(3)
    ->push(2)
    ->push(1);

  echo "\nQueue with bubble sort strategy: ";
  show_queue_elements($queue_bubble_sort_strategy);

  $queue_with_quicksort_strategy = new NaivePriorityQueue(new QuickSortStrategy());
  $queue_with_quicksort_strategy->push(5)
    ->push(4)
    ->push(3)
    ->push(2)
    ->push(1);

  echo "\nQueue with quick sort strategy: ";
  show_queue_elements($queue_with_quicksort_strategy);
}
main();