<?php
if(isset($_SESSION)){
    error_log('show what you got in session: '.print_r($_SESSION, 1));
}


if(isset($_SESSION['CID'])){
    error_log('Show me session if exists: '.print_r($data, 1));
    ?>
    <script type = "text/javascript">
        var session = <?php echo $_SESSION['CID']; ?>;
    </script>
    <?php
}
?>
<div class="container">
    <div class ="row">
    <div class = "col-md-3">
        panel reklamowy
            <?php
                    // require "app/views/pages/partial/info_card.php";
            ?>
        </div>
        <div class = "col-md-6">
            <?php
                if(isset($data['ad']) && $data['ad'] == 1){
                    require_once "app/views/pages/partial/add_form.php";
                    require_once "app/views/pages/navi/buttons.php";
                }
            ?>
        </div>
        <div class = "col-md-3">
            <?php
                    require "app/views/pages/partial/info_card.php";
            ?>
        </div>
    </div>
</div>

<?php
    require_once "app/views/pages/modals/modal.php";
?>