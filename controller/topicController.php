<?php
require_once 'model/topic.php';
class topicController {
    private Topic $topic;

    /**
     * @param Topic $topic
     */
    public function __construct()
    {
        $this->topic = new topic(0 ,"");
    }

    public function listTopics(){
        $topics = $this->topic->getTopicsList();
        include 'view/listTopics.php';
    }
}