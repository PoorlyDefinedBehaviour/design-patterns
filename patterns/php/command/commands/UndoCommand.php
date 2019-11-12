<?php declare (strict_types = 1);

require_once __DIR__ . "/Command.php";

class UndoCommand extends Command {
  public function execute(): void {
    $this->app->undo();
  }
}
