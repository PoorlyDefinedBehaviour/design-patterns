<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Strategy.php";

class QuickSortStrategy implements SortingStrategy {
  private function swap(&$a, &$b): void {
    [$a, $b] = [$b, $a];
  }

  private function sort_impl(array &$array, int $start, int $end): void {
    if ($start > $end) {
      return;
    }

    $pivot_index = $start;
    $pivot_value = $array[$end];

    for ($i = $start; $i < $end; ++$i) {
      if ($array[$i] < $pivot_value) {
        $this->swap($array[i], $array[$pivot_index]);
        $pivot_index += 1;
      }
    }

    $this->swap($array[$pivot_index], $array[$end]);

    $this->sort_impl($array, $start, $pivot_index - 1);
    $this->sort_impl($array, $pivot_index + 1, $end);
  }

  public function sort(array &$array): void {
    $length = \count($array);

    $this->sort_impl($array, 0, $length - 1);
  }
}