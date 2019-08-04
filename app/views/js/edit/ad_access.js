var access = {
    initialise : function(){
        $('#check_me').click(function(){

            // if(access.validate()==true){
                access.findthead();
                // swal("No Brawo", "Wyglada na to ze wiesz jak klikac w klawisze :)", "success").then(function(){
                //     window.location = "./edit";
                // });
            // }else{
            //     swal("Cos poszlo nie tak", "Upewnij sie podane dane sa poprawne", "warning").then(function(){
            //         window.location = "./edit";
            //     });
            // }


        });
    },

    validate : function () {
        return true;
    },

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
            var message = 'to jest inna wiadomosc na powodzenie samej akcji z pisaniem wiadomosci dla uzytkownikow';
            if(e.code !== '6000'){
                swal(
                    "Ogłoszenie dodane", message, "warning"
                );
            }else{
                swal(
                    "Ogłoszenie dodane", message, "success"
                ).then(function(){
                    window.location = "./edit";
                });
            }

        });
    }
}

var init = function(){
    access.initialise();    
}

init();