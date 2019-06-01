<div class="container">

    <div class="jumbotron">
    <h1 class="display-3">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    <div style="float:left;">PRACA</div><div style="float:right; cursor:pointer;" id="trade" value="trade">Dodaj</div>
                </span>
            </div>
            <?php
                for($a=0; $a<20; $a++){
                    require "card_small.php";
                }
            ?>
        </div>
        <div class="col-4">
        <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    <div style="float:left;">USŁUGI</div><div style="float:right; cursor:pointer;" id="services">Dodaj</div>
                </span>
            </div>
            <?php
                for($a=0; $a<20; $a++){
                    require "card_small.php";
                }
            ?>
        </div>
        <div class="col-4">
            <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    <div style="float:left;">NIERUCHOMOŚCI</div><div style="float:right; cursor:pointer;" id="property">Dodaj</div>
                </span>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action disabled">Do wynajęcia
                </a>
            </div>
            <?php
                for($a=0; $a<20; $a++){
                    require "card_small.php";
                }
            ?>
        </div>
    </div>
</div>

<?php
require_once "modal.php";
?>