var active = {
    initialise : function(){

        swal("Ogłoszenie Aktywowane", "Twoje ogłoszenie jest już aktywne i widoczne.", "success").then(function(){
            window.location = "./";
        });

    }
}

var init = function(){
    active.initialise(); 
}

init();