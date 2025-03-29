<?php


class News extends Database
{


    public function __construct($method)
    {
        // main "FETCHING NEWS FROM - https://api.nazarethinstitute.org/api/news";
        // test "FETCHING NEWS FROM - http://localhost/microservice/api/v1/posts/";

        if ($method === "GET") 
        {
            $source = "http://localhost/microservice/api/v1/posts/";
            $data = $this->getDataFromSource($source);
            $this->view('news', $data);
            http_response_code(201);
            exit;
        }
    }


    private function view($file, ?array $data)
    {
        if (file_exists(dirname(__DIR__) . '/views/' . $file . '.php')) {
            extract($data);
            require dirname(__DIR__) . '/views/' . $file . '.php';
        } else {
            require './Views/404.php';
            http_response_code(501);
            exit;
        }
    }


    private function getDataFromSource($source): array
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response, true);

        return $data;
    }
}
