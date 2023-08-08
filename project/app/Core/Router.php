<?php

namespace app\Core;

use Exception;
class Router
{
    private array $routes = array();

    public function get($route, $callback): void
    {
        $this->addRoute('GET', $route, $callback);
    }
    public function post($route, $callback): void
    {
        $this->addRoute('POST', $route, $callback);
    }

    public function put($route, $callback): void
    {
        $this->addRoute('PUT', $route, $callback);
    }

    public function delete($route, $callback): void
    {
        $this->addRoute('DELETE', $route, $callback);
    }

    public static function URL(): string
    {
        return "/" . trim(getenv('ROOTURL'));
    }
    private function addRoute($method, $route, $callback)
    {
        $route = preg_replace('/\{(\w+)\}/', '(\w+)', $route);
        $route = "#^$route$#";
        $this->routes[$method][$route] = array('callback' => $callback);
    }

    public function route()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Abdulrahnan
        // To Delete if direct domain
//        $uri=substr($uri,1, strlen($uri));
//        $uri=substr($uri, strpos($uri, '/'));

        $uri_a = substr($uri, strpos($uri, "/") + 1);
        $uri = substr($uri_a, strpos($uri_a, "/") + 1);
        $method = $_SERVER['REQUEST_METHOD'];
        if (array_key_exists($method, $this->routes)) {
            foreach ($this->routes[$method] as $route => $data) {
                if (preg_match($route, $uri, $matches)) {
                    array_shift($matches);
                    $callback = $data['callback'];
                    if (is_callable($callback)) {
                        call_user_func_array($callback, $matches);
                        exit();
                    }
                    $class = new $callback[0];
                    call_user_func_array([$class, $callback[1]], $matches);
                    return;
                }
            }
        } else {
            header("HTTP/1.0 405");
            $array['response'] = "Method not allowed.";
            echo json_encode($array);
        }
    }
}