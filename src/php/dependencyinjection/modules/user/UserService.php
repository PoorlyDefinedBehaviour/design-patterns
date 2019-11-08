<?php declare (strict_types = 1);

require_once __DIR__ . "/../../models/UserModel.php";

class UserService {
  private UserModel $user_model;

  public function __construct(UserModel $user_model) {
    $this->user_model = $user_model;
  }

  public function login(string $username, string $password): array{
    $user = $this->user_model->find_by(["username" => $username, "password" => $password]);
    return [true, $user];
  }
}