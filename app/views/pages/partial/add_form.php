<script type="text/javascript" src="app/views/js/home/prev_ads.js"></script>
<form name="ads" method="post" id="new_ad">

<div class="form-group">
  <div class="row">
    <div class="col-3">
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="0" checked="">
        <label class="custom-control-label" for="customRadio1" id="ad_radio1">Oferuję</label>
      </div>
    </div>
    <div class="col-3">
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="1">
        <label class="custom-control-label" for="customRadio2"  id="ad_radio2">Szukam</label>
      </div>
    </div>
    <div class="col-6">
      <select name="category" class="form-control" id="ad_category">
        <option value="0"> Wybierz Kategorię</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
      <input type="text" class="form-control" placeholder="Tytuł" id="ad_title">
</div>
<div class="form-group">
      <textarea class="form-control" rows="5" placeholder="Treść ogłoszenia" id="ad_content"></textarea>
</div>

<div class="form-group">
  <div class="row">
    <div class="col-7">
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="ad_img">
          <label class="custom-file-label" for="img">Dodaj zdjęcie</label>
        </div>
      </div>
    </div>
    <div class="col-5">
      <button type="button" class="btn btn-info push-right" id="ad_prev">Podgląd</button>
    </div>
  </div>
</div>

<div class="form-group">
  <h5>Dane kontaktowe</h5>
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
      <input type="email" class="form-control" placeholder="Adres Email"  id="ad_email">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Strona WWW"  id="ad_www">
    </div>
  </div>
</div>
<div class="form-group">
  <h5>Dostępność</h5>
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

</form>