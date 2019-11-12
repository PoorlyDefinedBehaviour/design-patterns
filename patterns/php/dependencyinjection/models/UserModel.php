<?php declare (strict_types = 1);

require_once __DIR__ . "/../core/Model.php";

class UserModel extends Model {
  public string $username;
  public string $password;
}