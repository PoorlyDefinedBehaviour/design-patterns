<?php declare (strict_types = 1);

require_once __DIR__ . "/Command.php";

class CopyCommand extends Command {
  public function execute(): void {
    $this->app->clipboard = $this->editor->get_selection();
  }
}
