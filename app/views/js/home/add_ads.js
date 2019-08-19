// add ads from everywhere
var addtype = '';


var newads = {
    initialise : function(){
        $('#trade').click(function(){
            newads.clearmodal();
            addtype = newads.show_type('job');
            $('#modal_add').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Praca');
        });
        
        $('#services').click(function(){
            newads.clearmodal();
            addtype = newads.show_type('services');
            $('#modal_add').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Usługi');
        });

        $('#property').click(function(){
            newads.clearmodal();
            addtype = newads.show_type('property');
            $('#modal_add').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Nieruchomości');
        });

        $('#save').click(function(){
            if($('#new_ad').valid() !== false){
                newads.submit_ads(); 
            }
        });
        
    },

    print_form : function(){
        $.ajax({
            async: true,
            type: "GET",
            url: "http://findmein.dev.uk/app/views/pages/partial/add_form.php",
            data: {},
            success: function(data){
              $('#modal_form').html(data);
            }
        });
    },

    change_title : function(e){
        $('#modal_title').replaceWith('<h5 class="modal-title" id="modal_title">' + e + '</h5>');
    },

    show_type : function(e){
        switch(e){
            case 'job':
                return 1;
            break;

            case 'services':
                return 2;
            break;

            case 'property':
            return 3;
            break;
        }
    },

    get_category : function(e){
        $.ajax({
            async: true,
            cache: false,
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            type: "GET",
            url: "http://findmein.dev.uk/app/views/pages/partial/add_category.php",
            data: {
                "category_id" : e
            },
        }).done(function(res){
            console.log(res);
        });        
    },

    submit_ads : function(){

        $.ajax({
            async: true,
            type: "POST",
            dataType: 'json',
            url: "home/submitAds",
            data: {
                "type" : radio,
                "category" : addtype,
                "title" : $('#ad_title').val(),
                "content" : $('#ad_content').val(),
                "en_title" : $('#en_title').val(),
                "en_content" : $('#en_content').val(),
                "person" : $('#ad_person').val(),
                "phone" : $('#ad_phone').val(),
                "email" : $('#ad_email').val(),
                "www" : $('#ad_www').val(),
                "range" : $('#ad_city').val(),
                "postcode" : $('#ad_postcode').val()
            }
        }).done(function(resp){

            $('#modal_add').modal('hide');
            swal(
                "Ogłoszenie dodane", "Aktywuj swoje ogłoszenie klikając w link wysłany emailem na adres podany w tresci ogłoszenia.", "success"
            );

        });
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

    },

    clearmodal : function(){

        $('#modal_add').removeAttr( "class" ).attr("class", "modal fade bd-example-modal-md");
        $('#modalsize').removeAttr( "class" ).attr("class", "modal-dialog modal-md modal-dialog-centered");

        $('#modal_form').empty();
        $('#modal_title').empty();

        $('#save').show();
        $('#back').hide();
        $('#logreg').hide();

    }

}

var init = function(){
    newads.initialise();
}

init();