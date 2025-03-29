<?php


class Contribute extends Database
{
    public $error = [];
    public $message = [];

    private string $title;
    private string $content;
    private string $author;

    public function __construct($method, $uri)
    {

        switch ($method) {
            case "GET":
                $this->view('contribute', $data = []);
                break;

            case "POST":
                $this->title = htmlentities($_POST['title']);
                $this->content = htmlentities($_POST['content']);
                $this->author = htmlentities($_POST['author']);

                if (empty($this->author)) {
                    $this->author = "Anonymous";
                }

                if ($this->createPost($this->title, $this->content, $this->author)) 
                {
                    $this->message = ["message" => "Contribution Published Successfully!"];
                    $this->view('contribute', $this->message);
                    unset($this->message);
                } else {
                    header("location: " . MICROSERVICE . "/contribute");
                    exit;
                }
                break;
        }
    }


    private function createPost($title, $content, $author): void
    {
        if ($this->validateInput($title, $content) == true) {
            $post_id = uniqid();

            $query = "INSERT INTO posts (post_id, title, description, author) 
            VALUES (?, ?, ?, ?)";

            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($post_id, $title, $content, $author));
        }
    }

    private function validateInput($title, $content): bool
    {
        $result = null;

        if (strlen($title) > 5) {
            $result = true;
            if (strlen($content) > 100) {
                $result = true;
            } else {
                $this->error = ["error" => "Content must be 100 words and above!"];
                $result = false;
            }
        } else {
            $this->error = ["error" => "Title Must be 5 words and above!"];
            $result = false;
        }

        return $result;
    }













    private function view($file, ?array $data)
    {
        if (file_exists(dirname(__DIR__) . '/views/' . $file . '.php')) {
            extract($data);
            require dirname(__DIR__) . '/views/' . $file . '.php';
        }
    }
}
