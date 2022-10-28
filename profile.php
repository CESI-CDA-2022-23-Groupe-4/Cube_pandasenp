<?php 
    session_start(); 
    require('actions/users/blockedAction.php');
    require('actions/users/showOneUsersProfileAction.php');   
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($getHisQuestions)){

                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_username; ?></h4>
                        <hr>
                        <p><?= $user_lastname . ' ' . $user_firstname; ?></p>
                    </div>
                </div>
                <br>
                <?php
                while($question = $getHisQuestions->fetch()){ 
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $question['title']; ?>
                        </div>
                        <div class="card-body">
                            <?= $question['description']; ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $question['author_username']; ?> le <?= $question['publication_date'];  ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }

            }
        ?>  
    </div>

</body>
</html>