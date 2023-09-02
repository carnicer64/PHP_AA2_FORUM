<?php
require_once '../model/BDConnection/BDConnection.php';

class post {
    private int $postId;
    private string $message;
    private int $userID;
    private int $threadID;

    /**
     * @param int $postID
     * @param string $message
     * @param int $userID
     * @param int $threadID
     */
    public function __construct(int $postId, string $message, int $userID, int $threadID)
    {
        $this->postId = $postId;
        $this->message = $message;
        $this->userID = $userID;
        $this->threadID = $threadID;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getUserID(): int
    {
        return $this->userID;
    }

    /**
     * @param int $userID
     */
    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return int
     */
    public function getThreadID(): int
    {
        return $this->threadID;
    }

    /**
     * @param int $threadID
     */
    public function setThreadID(int $threadID): void
    {
        $this->threadID = $threadID;
    }


function getPostsList($threadID){
    try {
        $connection = BDConnection::ConnectBD();

        if (gettype($connection) == "string") {
            return $connection;
        }

        $sql = "SELECT * FROM posts WHERE threadID = :threadID";
        // Control de inyeccion
        $response = $connection->prepare($sql);

        $response->execute(array(":threadID" => $threadID));
        $response = $response->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        if($response) {
            return $response;
        } else {
            $response = null;
        }
    } catch (PDOException $e){
        return BDConnection::mensajes($e->getCode());
    }
}

//UPDATE `posts` SET `message` = 'You\'re welcome!' WHERE `posts`.`postId` = 4

function newPost($message, $userID, $threadID) {
    try {
        $connection = BDConnection::ConnectBD();

        if (gettype($connection) == "string") {
            return $connection;
        }
        $sql = "INSERT INTO posts (message, userID, threadID) VALUES (:message,:userID,:threadID)";
        // Control de inyeccion
        $response = $connection->prepare($sql);

        $response->execute(array(":message" => $message, ":userID" => $userID, ":threadID" => "$threadID"));

        $connection = null;
        return  $response;
    } catch (PDOException $e){
        return BDConnection::mensajes($e->getCode());
    }
}

    function editPost($message, $postID) {
        try {
            $connection = BDConnection::ConnectBD();

            if (gettype($connection) == "string") {
                return $connection;
            }
            $sql = "UPDATE posts SET message = :message WHERE postId = :postID";
            // Control de inyeccion
            $response = $connection->prepare($sql);

            $response->execute(array(":message" => $message, ":postID" => $postID));

            $connection = null;
            return  $response;
        } catch (PDOException $e){
            return BDConnection::mensajes($e->getCode());
        }
    }
    //"DELETE FROM posts WHERE `posts`.`postId` = 4
    function deletePost($postID) {
        try {
            $connection = BDConnection::ConnectBD();

            if (gettype($connection) == "string") {
                return $connection;
            }
            $sql = "DELETE FROM posts WHERE postId = :postID";
            // Control de inyeccion
            $response = $connection->prepare($sql);

            $response->execute(array(":postID" => $postID));

            $connection = null;
            return  $response;
        } catch (PDOException $e){
            return BDConnection::mensajes($e->getCode());
        }
    }

}