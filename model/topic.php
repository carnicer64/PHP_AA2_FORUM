<?php
require_once 'model/BDConnection/BDConnection.php';
class topic {
    private int $topicID;
    private string $name;

    /**
     * @param int $topicID
     * @param string $name
     */
    public function __construct($topicID, $name)
    {
        $this->topicID = $topicID;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getTopicID()
    {
        return $this->topicID;
    }

    /**
     * @param int $topicID
     */
    public function setTopicID($topicID)
    {
        $this->topicID = $topicID;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function getTopicsList() {
        try {
            $connection = BDConnection::ConnectBD();

            if (gettype($connection) == "string") {
                return $connection;
            }

            $sql = "SELECT * FROM topics";
            // Control de inyeccion
            $response = $connection->prepare($sql);

            $response->execute();
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