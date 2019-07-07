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

                show_ads(1, 0, $data);

            ?>
        </div>
        <div class="col-4">
        <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    <div style="float:left;">USŁUGI</div><div style="float:right; cursor:pointer;" id="services">Dodaj</div>
                </span>
            </div>
            <?php

                show_ads(2, 0, $data);

            ?>
        </div>
        <div class="col-4">
            <div class="list-group">
                <span class="list-group-item list-group-item-action active">
                    <div style="float:left;">NIERUCHOMOŚCI</div><div style="float:right; cursor:pointer;" id="property">Dodaj</div>
                </span>
            </div>
            <?php

                show_ads(3, 0, $data);
            
            ?>
        </div>
    </div>
</div>

<?php

function show_ads($category, $type, $data){
    foreach ($data AS $value){
        if($value['Category_ID'] == $category &&  $value['Type_ID'] == $type){
            View::partial('card_small', $value);
        }
    }
}

require_once "app/views/pages/modals/modal.php";
?>
