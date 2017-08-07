<h2 stlye="margin-left:33%; margin-right:33%;"><?= $title ?></h2>

<?php if (isset($_SESSION['about_message'])) { ?>
<h3 stlye="margin-left:33%; margin-right:33%;">
<?php
            echo $_SESSION['about_message'];
?>
</h3>
<?php } $_SESSION['about_message'] = NULL;?>