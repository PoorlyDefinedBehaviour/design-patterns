<?php declare (strict_types = 1);

interface SortingStrategy {
  public function sort(array &$collection): void;
}