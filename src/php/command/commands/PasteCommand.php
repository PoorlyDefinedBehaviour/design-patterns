<?php declare (strict_types = 1);

require_once __DIR__ . "/Command.php";

class PasteCommand extends Command {
  public function execute(): void {
    $this->save_backup();
    $this->editor->replace_selection($this->app->clipboard);
  }
}
