<?php

class Posts extends Database
{

    public function __construct($method, $uri)
    {
        // var_dump($uri);

        switch ($method) {
            case "GET":
                if (isset($uri[2])) {
                    $data = $this->getPosts();

                    $this->view('posts', $data);

                    if (isset($uri[3])) {
                        $post_id = $uri[3];

                        if ($this->postExists($post_id) == true) {
                            $data = $this->getSinglePost($post_id);
                            return $this->view('single-post', $data);
                        }
                    }
                }
                break;

            case "POST":
                $data = $_POST;
                echo json_encode($data);
                break;
        }
    }



    private function getPosts(): array
    {
        $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 5";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    private function postExists($id): bool
    {
        $query = "SELECT * FROM posts WHERE post_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($id));

        $data = $stmt->rowCount();

        if ($data === 1) {
            return true;
        } else {
            return false;
        }
    }

    private function getSinglePost($id): array
    {
        $query = "SELECT * FROM posts WHERE post_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($id));

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

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
