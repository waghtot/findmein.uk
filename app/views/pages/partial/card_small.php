<div class="card" id="ad_<?php echo $data['ID']; ?>">
  <div class="card-body">
    <h4 class="card-title"><?php echo $data['Title']; ?></h4>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['Person']." | ".$data['Publish_Date']; ?></h6>
    <p class="card-text"><?php echo $data['Content']; ?></p>
    <a href="#" class="card-link">Więcej</a>
  </div>
</div>