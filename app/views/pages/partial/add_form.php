<script type="text/javascript" src="app/views/js/home/prev_ads.js"></script>

<div id="this_prev"></div>


<form name="ads" method="POST" id="new_ad">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#pl">Polski</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#en">English</a>
  </li>
  <li class="nav-item">
    <div class="form-group">
        <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="0" checked="">
        <label class="custom-control-label" for="customRadio1" id="ad_radio1">Oferuję</label>
      </div>
   </div>
  </li>
  <li class="nav-item">
  <div class="form-group">
        <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="1">
        <label class="custom-control-label" for="customRadio2"  id="ad_radio2">Szukam</label>
      </div>
   </div>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="pl">
    <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Tytuł" id="ad_title">
    </div>
    <div class="form-group">
          <textarea class="form-control" name="content" rows="5" placeholder="Treść ogłoszenia" id="ad_content"></textarea>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-7">
          <div class="input-group mb-3">
            <!-- <div class="custom-file">
              <input type="file" class="custom-file-input" id="ad_img">
              <label class="custom-file-label" for="img">Dodaj zdjęcie</label>
            </div> -->
          </div>
        </div>
        <div class="col-5">
          <button type="button" class="btn btn-info push-right" id="ad_prev">Podgląd</button>
        </div>
      </div>
    </div>
</div>

<div class="tab-pane fade" id="en">

<div class="form-group">
      <input type="text" class="form-control" name="title" placeholder="Title" id="en_title">
</div>
<div class="form-group">
      <textarea class="form-control" name="content" rows="5" placeholder="Content" id="en_content"></textarea>
</div>

<div class="form-group">
  <div class="row">
    <div class="col-7">
      <div class="input-group mb-3">
        <!-- <div class="custom-file">
          <input type="file" class="custom-file-input" id="ad_img">
          <label class="custom-file-label" for="img">Dodaj zdjęcie</label>
        </div> -->
      </div>
    </div>
    <div class="col-5">
      <button type="button" class="btn btn-info push-right" id="en_prev">Preview</button>
    </div>
  </div>
</div>

</div>
</div>

<div class="form-group">
  <h5>Dane Kontaktowe</h5>
</div>

<div class="form-group">
  <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Osoba kontaktowa" id="ad_person">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Numer telefonu" id="ad_phone">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <div class="col">
      <input type="email" class="form-control" placeholder="Adres Email"  id="ad_email" required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Strona WWW"  id="ad_www">
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Miasto" id="ad_city">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Kod Pocztowy" id="ad_postcode">
    </div>
  </div>
</div>

<div class="form-group">
  <div id="button_set">
  </div>
</div>

</form>