<?php
?>
<div class="right_col" role="main">
    <?php
    if(!empty($this->error)):
    ?>
    <div style="color: red">
        <h3>
            <?php echo $this->error; ?>
        </h3>
    </div>
    <?php
    endif;
    ?>
    <?php
    if(isset($_SESSION['error'])):
        ?>
        <div style="color: red">
            <h3>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </h3>
        </div>
    <?php endif; ?>
    <?php
    if(isset($_SESSION['success'])):
    ?>
    <div style="color: green;">
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
    <?php endif; ?>
    <?php echo $this->content; ?>
</div>
