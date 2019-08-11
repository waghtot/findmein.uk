var login = {
    logreg : function(){
        $('#login').click(function(){
            login.clearmodal();
            $('#modal_title').replaceWith('<h5 class="modal-title" id="modal_title">Logowanie</h5>');
            $('#modal_add').modal('show');
            login.printform();
        });

        $('#logreg').click(function(){

            $.ajax({
                async: true,
                type: "POST",
                dataType: 'json',
                url: "home/login",
                data: {
                    "email" : $('#log_email').val(),
                    "password" : $('#log_passw').val()
                }
            }).done(function(e){
                if(e.code == '6002'){
                    $('#fp').html('<a href="#" id="zp">Zapomniałem hasła</a>');
                }else if(e.NewAcc == 1){
                    $('#modal_add').modal('hide');
                    swal(
                        "Konto utworzone", "Na podany adres został wysłany link aktywacyjny. W zależności od ustawień filtra twoje poczty, jeśli nie znajdziesz go w głównej skrzynce sprawdź akrzynkę ze spamem.", "success"
                    ).then(function(){
                        window.location = "./";                        
                    });
                }else{
                    window.location = "./";
                }
            });
        });

    },
    
    printform : function(){
        $.ajax({
            async: true,
            type: "GET",
            url: "app/views/pages/partial/login_form.php",
            data: {},
            success: function(data){
              $('#modal_form').html(data);
            }
        });

    },

    clearmodal : function(){
        $('#modal_add').removeAttr( "class" ).attr("class", "modal fade bd-example-modal-sm");
        $('#modalsize').removeAttr( "class" ).attr("class", "modal-dialog modal-sm modal-dialog-centered");

        $('#modal_form').empty();
        $('#modal_title').empty();
        $('#save').hide();
        $('#back').hide();
        $('#logreg').show();
        
    }
}

var init = function(){
    login.logreg();
}

init();