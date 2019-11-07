<?php declare (strict_types = 1);

class Editor {
  private string $text;

  public function get_selection(): string {
    return $this->text;
  }

  public function delete_selection(): Editor {
    $this->text = "";
    return $this;
  }

  public function replace_selection($text): Editor {
    $this->text = $text;
    return $this;
  }
}