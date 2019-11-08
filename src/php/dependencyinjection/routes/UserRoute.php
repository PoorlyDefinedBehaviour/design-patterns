<?php declare (strict_types = 1);

require_once __DIR__ . "/../models/UserModel.php";
require_once __DIR__ . "/../core/Router.php";
require_once __DIR__ . "/../modules/user/UserController.php";
require_once __DIR__ . "/../modules/user/UserService.php";

$user_controller = new UserController(new UserService(new UserModel()));

$router = new Router();
$router->get("/login", $user_controller->login);