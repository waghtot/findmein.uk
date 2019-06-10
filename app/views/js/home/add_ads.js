// add ads from everywhere
var addtype = '';


var newads = {
    initialise : function(){

        $('#trade').click(function(){
            addtype = newads.show_type('job');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Praca');
        });
        
        $('#services').click(function(){
            addtype = newads.show_type('services');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Usługi');
        });

        $('#property').click(function(){
            addtype = newads.show_type('property');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            // newads.get_category(addtype);
            newads.change_title('Nieruchomości');
        });

        $('#save').click(function(){
            newads.submit_ads(); 
        });

        $('#back').hide();
    },

    print_form : function(){
        $.ajax({
            async: true,
            type: "GET",
            url: "app/views/pages/partial/add_form.php",
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
            url: "app/views/pages/partial/add_category.php",
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
            url: "home/submitAds",
            data: {
                "type" : radio,
                "category" : addtype,
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
        }).done(function(){
            console.log('all good, all done ' + radio + ' category ' + addtype );
            $('#modal_add').modal('hide');
            swal(
                "looks good", "ads has been added", "success"
            );
        });
    }

    // get_category : function(e){
    //     $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
    //         options.async = true;
    //     });
    //     $.ajax({
    //         async: true,
    //         cache: false,
    //         dataType: "json",
    //         contentType: "application/json; charset=utf-8",
    //         type: "POST",
    //         url: "home/getCategory",
    //         data: {
    //             "category_id" : e
    //         }
    //         // ,
    //         // success : function(data){
    //         //     console.log(JSON.parse(data));
    //         // }
    //     }).done(function(res){

    //         console.log(JSON.parse(res.code));
    //     });
    // }

}

var init = function(){
    newads.initialise();    
}

init();