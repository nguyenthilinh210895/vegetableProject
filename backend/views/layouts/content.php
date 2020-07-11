<?php
?>
<div class="right_col" role="main">
    <?php
    if(!empty($this->error)):
    ?>
    <div style="color: red">
        <h2>
            <?php echo $this->error; ?>
        </h2>
    </div>
    <?php
    endif;
    ?>
    <?php
    if(isset($_SESSION['error'])):
        ?>
        <div style="color: red">
            <h2>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </h2>
        </div>
    <?php endif; ?>
    <?php
    if(isset($_SESSION['success'])):
    ?>
    <div style="color: green;">
        <h2>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h2>
    </div>
    <?php endif; ?>
    <?php echo $this->content; ?>
</div>
