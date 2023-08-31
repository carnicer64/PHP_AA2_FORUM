<?php
include("header.php");
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h2>Welcome to <br> COMPUTER FORUM
    </div>
</div>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h3>Topic list
    </div>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($topics as $topic): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text"><?php echo $topic['name'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="view/listThreads.php?topicID=<?php echo $topic['topicID'] ?>">See Threads</a>
                                        <?php
                                        if(isset($_SESSION["user"])){
                                            if(isset($_SESSION["role"])){
                                                if($_SESSION["role"] == "admin"){
                                        ?>
                                                    <a class="btn btn-sm btn-outline-primary" href="view/listThreads.php?topicID=<?php echo $topic['topicID'] ?>">Delete topic</a>
                                                    <a class="btn btn-sm btn-outline-primary" href="view/listThreads.php?topicID=<?php echo $topic['topicID'] ?>">Edit topic</a>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
