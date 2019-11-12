<?php declare (strict_types = 1);

require_once __DIR__ . "/../editor/Editor.php";

abstract class Command {
  protected $editor;
  protected $backup;

  public function __construct($editor) {
    $this->editor = $editor;
  }

  public function save_backup(): void {
    $this->backup = $this->editor->text;
  }

  public function undo(): void {
    $this->editor->text = $this->backup;
  }

  public abstract function execute(): void;
}
