<?php declare (strict_types = 1);

require_once __DIR__ . "/../strategies/DefaultLoggingStrategy.php";

class Logger {
  private static  ? Logger $instance = null;
  private $logging_strategy;

  private function __construct() {
    $this->logging_strategy = new DefaultLoggingStrategy();
  }

  public static function get_instance() : Logger {
    if (!self::$instance) {
      self::$instance = new Logger();
    }
    return self::$instance;
  }

  public function set_logging_strategy($loggin_strategy): Logger {
    $this->logging_strategy = $loggin_strategy;
    return self::$instance;
  }

  public function log(string $text): Logger {
    $this->logging_strategy->log($text);
    return self::$instance;
  }
}