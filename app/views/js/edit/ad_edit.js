var radio ='0';

var edit = {
    initialise : function (){
        if(typeof session !== 'undefined'){
            edit.get_content();

            $('#customRadio1').click(function(){
                $('#customRadio1').attr('checked', true);
                radio = $('#customRadio1').val();
            });
    
            $('#customRadio2').click(function(){
                $('#customRadio2').attr('checked', true);
                radio = $('#customRadio2').val();
            });

            edit.ad_about_to_renew();


                $('#btn_renew').click(function(){
                    edit.renew_ad();
                });
            
            $('#btn_delete').click(function(){

                    edit.delete_ad();

            });
            
            $('#btn_submit').click(function(){
                if($('#new_ad').valid() !== false){
                    edit.save_changes(); 
                }
            });
        }
    },

    get_content : function(){
        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "edit/adtoedit",
            data: {
                "cid" : session
            }
        }).done(function(e){
            $('#ad_title').attr('value', e.Title);
            $('#ad_content').append(e.Content);
            $('#ad_person').attr('value', e.Person);
            $('#ad_phone').attr('value', e.Phone);
            $('#ad_email').attr('value', e.Email);
            $('#ad_www').attr('value', e.Www);
            $('#ad_city').attr('value', e.Range);
            $('#ad_postcode').attr('value', e.PostCode);
            if(e.Type_ID == 0){
                $('#customRadio2').removeAttr('checked');
                $('#customRadio1').attr('checked', 'true');
                radio = $('#customRadio1').val();
            }else{
                $('#customRadio1').removeAttr('checked');
                $('#customRadio2').attr('checked', 'true');
                radio = $('#customRadio2').val();
            }

            $('#btn_cancel').click(function(){
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: 'json',
                    url: "edit/adtoedit",
                    data: {}
                }).done(function(e){
                    swal(
                        "Ogloszenie nie zmienione", "Nie dokonano zmian w ogloszniu.", "info"
                    ).then(function(){
                        window.location = "./edit";
                    });
                });
            });
        });
    },

    buttons : function(){
        $.ajax({
            async: true,
            type: "GET",
            url: "app/views/pages/navi/buttons.php",
            data: {},
            success: function(data){
                $('#button_set').append().html(data);
            }
        });

    },

    save_changes : function(){
        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "edit/updateAd",
            data: {
                "type" : radio,
                "title" : $('#ad_title').val(),
                "content" : $('#ad_content').val(),
                "img" : $('#ad_img').val(),
                "person" : $('#ad_person').val(),
                "phone" : $('#ad_phone').val(),
                "email" : $('#ad_email').val(),
                "www" : $('#ad_www').val(),
                "range" : $('#ad_city').val(),
                "postcode" : $('#ad_postcode').val()
            }
        }).done(function(e){
            swal(
                "Ogłoszenie zostalo zmienione", "Mozesz je sobie podejrzec na stronie", "success"
            ).then(function(){
                window.location = "./edit";
            });
        });
    },

    ad_about_to_renew : function(){
        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "edit/aboutRenew",
            data: {
                "cid" : session
            }
        }).done(function(e){
            if(e.Expiry != 1){
                edit.hide_renew();
            }else{
                edit.show_renew();
            }
        });
    },

    show_renew : function (){
        $('#btn_renew').show();  
    },

    hide_renew : function(){
        $('#btn_renew').hide();
    },

    renew_ad : function(){
        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "edit/renevAd",
            data: {
                "cid" : session
            }
        }).done(function(e){
            edit.hide_renew();
            swal(
                "Ogłoszenie Wznowione", "Nowa data wygaśnięcia ogłoszenia to: " + e.NewExpiryDate, "success"
            ).then(function(){
                window.location = "./edit";
            });

        });
    },

    delete_ad : function(){

        swal({
            title: "Uwaga!!!",
            text: "Czy napewno chcesz usunąć to ogłoszenie?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: 'json',
                    url: "edit/deleteAd",
                    data: {
                        "cid" : session
                    }
                }).done(function(){
                    swal("Ogłoszenie Usunięte", "Twoje ogłoszenie zostało usunięte", {
                        icon: "success",
                    }).then(function(){
                        window.location = "./edit";
                    });
                });
            }
          });




        // $.ajax({
        //         async: true,
        //         type: "POST",
        //         dataType: 'json',
        //         url: "edit/deleteAd",
        //         data: {
        //             "cid" : session
        //         }
        //     }).done(function(e){
        //         swal(
        //             "Ogłoszenie Usunięte", "Twoje ogłoszenie zostało usuniete", "success"
        //         ).then(function(){
        //             window.location = "./edit";
        //         });
    
        // });
    },

    validateForm : function(){

        $('#new_ad').validate({
            rules: {
                eamil: {
                    required: true,
                    email: true
                },

                title: {
                    required: true,
                    minlength: 5
                },

                content: {
                    required: true,
                    minlength: 20
                }
                
            }
        });

    }

}



var init = function(){
    edit.initialise();    
}

init();