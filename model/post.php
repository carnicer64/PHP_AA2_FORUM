<?php
require_once '../model/BDConnection/BDConnection.php';

class post {
    private int $postID;
    private string $message;
    private int $userID;
    private int $threadID;

    /**
     * @param int $postID
     * @param string $message
     * @param int $userID
     * @param int $threadID
     */
    public function __construct(int $postID, string $message, int $userID, int $threadID)
    {
        $this->postID = $postID;
        $this->message = $message;
        $this->userID = $userID;
        $this->threadID = $threadID;
    }

    /**
     * @return int
     */
    public function getPostID(): int
    {
        return $this->postID;
    }

    /**
     * @param int $postID
     */
    public function setPostID(int $postID): void
    {
        $this->postID = $postID;
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

}