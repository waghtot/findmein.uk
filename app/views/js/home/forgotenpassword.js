var fp = {
    fpa : function(){
        $('#fp').click(function(){
            console.log('click');
            $('#modal_add').modal('hide');
            $.ajax({
                async: true,
                type: "POST",
                dataType: 'json',
                url: "home/forgotenpassword",
                data: {
                    "email" : $('#log_email').val(),
                }
            }).done(function(){

               swal(
                    "Przypomnienie Hasła", "Instrukcja zmiany hasła została wysłana na podany email", "success"
               ).then(function(){
                    window.location = "./";
               });
            });
        });
    }
}

var init = function(){
    fp.fpa();
}

init();