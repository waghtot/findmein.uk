var access = {
    start_action : function(){
        $('#check_me').click(function(){
            if($('#ad_access').valid() !== false){
                access.findthead(); 
            }else{
                swal("Cos poszlo nie tak", "Upewnij sie podane dane sa poprawne", "error").then(function(){
                    window.location = "./edit";
                });
            }
        });
    },

    // validate : function () {
    //     return true;
    // },

    findthead : function (){
        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "edit/findthead",
            data: {
                "refnum" : $('#refnum').val(),
                "signature" : $('#signature').val(),
            }
        }).done(function(e){
            console.log(e);

            if(e.code !== '6000'){
                var message = 'Szukane ogłoszenie wygasło lub zostało usunięte';
                swal(
                    "Błąd Wyszukiwania", message, "warning"
                );
            }else{
                var message = 'Twoje ogłoszeie zostało znalezione i jest gotowe do edycji';
                swal(
                    "Edycja ogłoszenia", message, "success"
                ).then(function(){
                    window.location = "./edit";
                });
            }

        });
    },

    validateForm : function(){

        $('#ad_access').validate({
            rules: {
                eamil: {
                    required: true,
                    email: true
                }                
            },
            message : {
                email : ''
            }
        });
    }
}

var init = function(){
    access.start_action();    
}

init();