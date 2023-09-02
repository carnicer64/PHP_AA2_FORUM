<?php
include("header.php");
include_once '../controller/threadsController.php';
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h3>List of threads
    </div>
</div>
<?php
if(isset($_SESSION["user"])){
    ?>

    <?php
}
?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            if($threads != null){
                foreach ($threads as $tem): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text"><?php echo $tem['name'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="viewPost.php?threadID=<?php echo $tem['threadID'] ?>">View</a>
                                        <?php
                                        if(isset($_SESSION["user"])){
                                            if(isset($_SESSION["role"])){
                                                if($_SESSION["role"] == "admin"){
                                                    ?>
                                                    <a class="btn btn-sm btn-outline-primary" href="deleteThread.php?topicID=<?php echo $thread->getTopicID() ?>&threadID=<?php echo $tem["threadId"]; ?>">Delete thread</a>
                                                    <a class="btn btn-sm btn-outline-primary" href="registerThread.php?topicID=<?php echo $thread->getTopicID() ?>&edit=true&name=<?php echo $tem["name"]; ?>&message=<?php echo $tem["message"]; ?>&threadID=<?php echo $tem["threadId"]; ?>">Edit thread</a>
                                                    <?php
                                                } elseif ($_SESSION["role"] == "user"){
                                                    if($_SESSION["userID"] == $tem["userID"]){
                                                        ?>
                                                        <a class="btn btn-sm btn-outline-primary" href="deleteThread.php?topicID=<?php echo $thread->getTopicID() ?>&threadID=<?php echo $tem["threadId"]; ?>">Delete thread</a>
                                                        <a class="btn btn-sm btn-outline-primary" href="registerThread.php?topicID=<?php echo $thread->getTopicID() ?>&edit=true&name=<?php echo $tem["name"]; ?>&message=<?php echo $tem["message"]; ?>&threadID=<?php echo $tem["threadId"]; ?>">Edit thread</a>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;}else{
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="card-text">NO THREADS HERE</p>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>

</body>
</html>