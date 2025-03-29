<?php


class Core
{

    private string $requestMethod;
    private string $currentController = "posts";

    private array $requestURI;

    public function __construct($uri, $method)
    {
        $this->requestMethod = $method;
        $this->requestURI = $uri;

        $default = isset($this->requestURI[2]) || isset($this->requestURI[3]) ? false : true;

        // var_dump($this->requestURI);
        // var_dump($default);

        if ($default) 
        {
           require_once './Views/home.php';
           exit;
        } 
        else 
        {
            if (isset($this->requestURI[2])) 
            {
                $this->currentController = $this->requestURI[2];

                if (file_exists(dirname(__DIR__) . '/controllers/' . $this->currentController . '.php')) {
                    require dirname(__DIR__) . '/controllers/' . $this->currentController . '.php';
                    new $this->currentController($this->requestMethod, $this->requestURI);

                    unset($this->currentController);
                } 
                else 
                {
                    require './Views/404.php';
                    http_response_code(404);
                    exit;
                }
            }
        }
    }
}
