<?php declare (strict_types = 1);

require_once __DIR__ . "/../interfaces/Strategy.php";

class BubbleSortStrategy implements SortingStrategy {
  private function swap(&$a, &$b): void {
    [$a, $b] = [$b, $a];
  }

  public function sort(array &$array): void {
    $length = \count($array);

    for ($i = 0; $i < $length; ++$i) {
      for ($j = 0; $j < $length; ++$j) {
        if ($array[$i] < $array[$j]) {
          $this->swap($array[$i], $array[$j]);
        }
      }
    }
  }
}