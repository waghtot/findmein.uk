var radio ='0';

var prev_form = {
    build_prev : function(){
        
        $('#back').click(function(){
            prev_form.hide_preview(); 
        });

        $('#ad_prev').click(function(){
            prev_form.hide_form();
            prev_form.print_prev();
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

    hide_form : function(){
        $('#this_prev').show();
        $('#new_ad').hide();
        $('#save').hide();
        $('#close').hide();
        $('#back').show(); 
    },

    hide_preview : function(){
        $('#this_prev').hide('');
        $('#new_ad').show();
        $('#save').show();
        $('#close').show();
        $('#back').hide();
    },

    input_data : function(){
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
    },

    validate_data : function (e){
        return true;
    },

    validate_email : function (e){

    },

    print_prev : function (){
        $.ajax({
            type: "POST",
            url: "app/views/pages/partial/ad_prev.php",
            data: prev_form.input_data(),
            success: function(data){
              $('#this_prev').html(data);
            }
        });
    }

}

var init = function(){
    prev_form.build_prev();    
}

init();