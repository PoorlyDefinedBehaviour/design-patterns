<?php declare (strict_types = 1);

require_once __DIR__ . "/../editor/Editor.php";
require_once __DIR__ . "/../stack/Stack.php";
require_once __DIR__ . "/../commands/CopyCommand.php";
require_once __DIR__ . "/../commands/CutCommand.php";
require_once __DIR__ . "/../commands/PasteCommand.php";
require_once __DIR__ . "/../commands/UndoCommand.php";

class App {
  private Editor $editor;
  private array $command_history;
  private string $clipboard;

  private array $shortcuts = [];

  public function __construct() {
    $this->editor = new Editor();
    $this->command_history = [];
    $this->clipboard = "";
  }

  public function init(): App {
    $this->shortcuts["Ctrl+C"] = new CopyCommand($this->editor);
    $this->shortcuts["Ctrl+X"] = new CutCommand($this->editor);
    $this->shortcuts["Ctrl+V"] = new PasteCommand($this->editor);
    $this->shortcuts["Ctrl+|"] = new UndoCommand($this->editor);

    return $this;
  }
}