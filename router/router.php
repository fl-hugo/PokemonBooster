<?php
class router
{
    private $request;
    private $routes = [
        'home' => ['controller' => 'homeController', 'method' => 'home'],
    ];
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function renderController()
    {
        $request = $this->request;
        if (key_exists($request, $this->routes)) {
            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];
            $currentController = new $controller();
            $currentController->$method();
        } else {
            // include(CONTROLLER.'404Controller.php');
        }
    }
}
