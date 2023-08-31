<?php
include("header.php");
include_once '../controller/postController.php';
include_once '../controller/threadsController.php';
if ($thread != null){
    ?>

<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom"><?php echo $thread->getName(); ?></h2>
    <div class="g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
            </div>
            <p> <?php echo $thread->getMessage(); ?></p>
        </div>
    </div>
</div>
<div class="container px-4 py-5" id="featured-3">
    <div class="g-4 py-5 row-cols-1 row-cols-lg-3">
        <?php
        if ($posts != null) {
            foreach ($posts as $tem): ?>
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
            </div>
            <h3 class="fs-2 text-body-emphasis">USER: <?php echo $userController->getUserName($tem["userID"])["username"]; ?></h3>
            <p><?php echo $tem['message'] ?></p>
        </div>
        <?php endforeach;
        } else { ?>
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
            </div>
            <p>NO POSTS AVAILABLE</p>
        </div>
        <?php }
        } else { ?>
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
            </div>
            <p>THE POST DOES NOT EXIST</p>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>

