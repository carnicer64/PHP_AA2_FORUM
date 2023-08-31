<?php
require_once '../model/thread.php';
class threadsController {
    private Thread $thread;

    public function __construct(){
        $this->thread = new thread(0, "","",0,0);
    }

    public function listThreads($topicID){
        return $this->thread->getThreadsList($topicID);
    }

    public function getThread($threadID){
        return $this->thread->getThread($threadID);
    }
}

$controller = new threadsController();
if(isset($_GET["topicID"])){
    $threads = $controller->listThreads($_GET["topicID"]);
} else {
    if(isset($_GET["threadID"])){
        $thread = $controller->getThread($_GET["threadID"]);
    }
}