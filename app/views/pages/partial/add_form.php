<form name="ads" method="post" id="new_ad">

<div class="form-group">
  <div class="row">
    <div class="col-3">
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
        <label class="custom-control-label" for="customRadio1">Oferuję</label>
      </div>
    </div>
    <div class="col-3">
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio2">Szukam</label>
      </div>
    </div>
    <div class="col-6">
      <select name="category" class="form-control" >
        <option value="0"> Wybierz Kategorię</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
      <input type="text" class="form-control" placeholder="Tytuł">
</div>
<div class="form-group">
      <textarea class="form-control" id="exampleTextarea" rows="5" placeholder="Treść ogłoszenia"></textarea>
</div>

<div class="form-group">
  <div class="row">
    <div class="col-7">
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02">Dodaj zdjęcie</label>
        </div>
      </div>
    </div>
    <div class="col-5">
      <button type="button" class="btn btn-info push-right">Podgląd</button>
    </div>
  </div>
</div>

<div class="form-group">
  <h5>Dane kontaktowe</h5>
</div>

<div class="form-group">
  <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Osoba kontaktowa">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Numer telefonu">
      </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <div class="col">
      <input type="email" class="form-control" placeholder="Adres Email">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Strona WWW">
    </div>
  </div>
</div>
<div class="form-group">
  <h5>Dostępność</h5>
</div>
<div class="form-group">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Miasto">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Kod Pocztowy">
    </div>
  </div>
</div>

</form>