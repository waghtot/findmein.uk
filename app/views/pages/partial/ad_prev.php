<?php

// incomming object:
// "type" : radio,
// "category" : $('#category').val(),
// "title" : $('#ad_title').val(),
// "content" : $('#ad_content').val(),
// "img" : $('#ad_img').val(),
// "person" : $('#ad_person').val(),
// "phone" : $('#ad_phone').val(),
// "email" : $('#ad_email').val(),
// "www" : $('#ad_www').val(),
// "city" : $('#ad_city').val(),
// "postcode" : $('#ad_postcode').val()


if(isset($_POST)){
    $data = array();
    $data = $_POST;
  // error_log('category list: '.print_r($_POST, 1));
}

?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?php echo $data['title']; ?></h4>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php // echo $data['category']; ?>
    </h6>
    <p class="card-text">
        <?php echo $data['content']; ?>
    </p>
    <a href="#" class="card-link">Rozwiń</a>
    <a href="#" class="card-link">Odpowiedz</a>
  </div>
</div>