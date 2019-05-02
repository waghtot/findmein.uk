// add ads from everywhere
var addtype = '';


var newads = {
    initialise : function(){

        $('#trade').click(function(){
            addtype = newads.show_type('trade');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            newads.change_title('Handel');
        });
        
        $('#services').click(function(){
            addtype = newads.show_type('services');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            newads.change_title('Usługi');
        });

        $('#property').click(function(){
            addtype = newads.show_type('property');
            $('#modal_add').slideDown('slow').modal('show');
            newads.print_form();
            newads.change_title('Nieruchomości');
        });
    },

    print_form : function(){
        $.ajax({
            type: "GET",
            url: "app/views/pages/partial/add_form.php",
            data: { },
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
            case 'trade':
                return 1;
            break;

            case 'services':
                return 2;
            break;

            case 'property':
            return 3;
            break;
        }
    }

}

var init = function(){
    newads.initialise();    
}

init();