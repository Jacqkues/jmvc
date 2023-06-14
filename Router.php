<?php
namespace jmvc;
class Router {

    private array $routes = [];
    public function addRoute(Rt $rt) {
      $this->routes[$rt->getPath()] = $rt;
    }
  
      public function handleRequest() {
          $path = $_SERVER['PATH_INFO'] ?? '/';
          $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
          if (!isset($this->routes[$path])) {
          echo '404';
          exit();
          }
        
          $act = $this->routes[$path];
          $act->execute();
      }
  }