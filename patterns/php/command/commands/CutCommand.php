<?php declare (strict_types = 1);

require_once __DIR__ . "/Command.php";

class CutCommand extends Command {
  public function execute(): void {
    $this->save_backup();
    $this->app->clipboard = $this->editor->get_selection();
    $this->editor->delete_selection();
  }
}
