<?php

/**
 * Valid API Endpoint for Posts: http://localhost/microservice/api/v1/posts
 * API Documentation Endpoint: http://localhost/microservice/api
 * required URI Params: [3] => v1 [4] => posts
 * Author: King Cosmos
 * API Version: v0.0.1
 */


class Api extends Database
{

    public function __construct($method, $uri)
    {
        if ($method === "GET") {

            if (isset($uri[3]) && isset($uri[4])) {
                $posts = $this->getPosts();
                header('content-type: text/json; charset=utf-8');
                echo json_encode($posts);
            } else {
                http_response_code(200);
                $this->view('api', $data = []);
            }
        } else {
            http_response_code(501);

            $message = [
                'message' => 'Allowed HTTP Request is GET only!',
            ];

            echo json_encode($message);
            exit;
        }
    }


    private function getPosts(): array
    {
        $query = "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


    private function view($file, ?array $data)
    {
        if (file_exists(dirname(__DIR__) . '/views/' . $file . '.php')) {
            extract($data);
            require dirname(__DIR__) . '/views/' . $file . '.php';
        }
    }
}
