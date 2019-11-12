<?php declare (strict_types = 1);

require_once __DIR__ . "/UserService.php";
require_once __DIR__ . "/../../core/Request.php";
require_once __DIR__ . "/../../core/Response.php";

class UserController {
  private UserService $user_service;

  public function __construct(UserService $user_service) {
    $this->user_service = $user_service;
  }

  public function login(Request $request, Response $response): Response {
    [$ok, $data] = $this->user_service->login($request->param("username"), $request->param("password"));
    if (!$ok) {
      return $response->status(401)->json(["message" => "invalid credentiasl"]);
    }
    return $response->status(200)->json(["data" => $data]);
  }
}