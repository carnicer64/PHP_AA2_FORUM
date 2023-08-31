<?php
include("header.php");
include_once '../controller/threadsController.php';
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h3>List of threads
    </div>
</div>
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
                        <p class="card-text">NO THREADS HERE></p>
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