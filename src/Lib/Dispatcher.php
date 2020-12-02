<?php

namespace Src\Lib;

class Dispatcher
{
    /**
     * The request we're working with.
     *
     * @var string
     */
    private $current_route;
    private $current_method;

    public const POST_METHOD = 'POST';
    public const GET_METHOD = 'GET';
    public const PUT_METHOD = 'PUT';
    public const DELETE_METHOD = 'DELETE';

    /**
     * The $routes array will contain our URI's and callbacks.
     * @var array
     */
    private $routes = [];

    /**
     * For this example, the constructor will be responsible
     * for parsing the request.
     *
     * @param $server
     */
    public function __construct($server)
    {
        $this->current_route = $server['REQUEST_URI'];
        $this->current_method = $server['REQUEST_METHOD'];
    }


    public function get(string $uri, $fn): void
    {
        $this->routes[$uri . "|" . self::GET_METHOD] = $fn;
    }

    public function post(string $uri, $fn): void
    {
        $this->routes[$uri . "|" . self::POST_METHOD] = $fn;
    }

    public function put(string $uri, $fn): void
    {
        $this->routes[$uri . "|" . self::PUT_METHOD] = $fn;
    }

    public function delete(string $uri, $fn): void
    {
        $this->routes[$uri . "|" . self::DELETE_METHOD] = $fn;
    }

    /**
     * Determine is the requested route exists in our
     * routes array.
     *
     * @param string|null $uri
     * @return boolean
     */
    protected function hasRoute(string $uri = null): bool
    {
        if (is_null($uri)) return false;
        return array_key_exists($uri, $this->routes);
    }


    public function run(): void
    {
        $params = @$this->routes[$this->current_route . "|" . $this->current_method];

        if (is_null($params)) {
            $this->handleNotFound();
            exit();
        }

        $controller = $params['controller'];
        $controller = str_replace("Src", "src", $controller);
        $controller = str_replace("\\", "/", $controller);

        require __DIR__ . '/../../' . $controller . '.php';

        if ($this->hasRoute($this->current_route . "|" . $this->current_method)) {
            $classInstance = new $params['controller'];
            echo $classInstance->{$params['method']}(1);
        } else {
            $this->handleNotFound();
        }
    }

    private function handleNotFound(): void
    {
        header("HTTP/1.0 404 not found");
    }
}