var radio ='0';

var prev_form = {
    build_prev : function(){
        
        $('#ad_prev').click(function(){
            console.log(prev_form.check_input_data());
        });

        $('#customRadio1').click(function(){
            $('#customRadio1').attr('checked', true);
            radio = $('#customRadio1').val();
        });

        $('#customRadio2').click(function(){
            $('#customRadio2').attr('checked', true);
            radio = $('#customRadio2').val();
        });
    },

    check_input_data : function(){
        var data = {
            "type" : radio,
            "category" : $('#category').val(),
            "title" : $('#ad_title').val(),
            "content" : $('#ad_content').val(),
            "img" : $('#ad_img').val(),
            "person" : $('#ad_person').val(),
            "phone" : $('#ad_phone').val(),
            "email" : $('#ad_email').val(),
            "www" : $('#ad_www').val(),
            "city" : $('#ad_city').val(),
            "postcode" : $('#ad_postcode').val()
        }
        return data; 
    }
}

var init = function(){
    prev_form.build_prev();    
}

init();