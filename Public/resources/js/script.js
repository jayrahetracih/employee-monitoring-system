var dropdown = document.getElementsByClassName("emp-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
     this.classList.toggle("active");
  
     var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
  });
}

//create_department.php
$(document).ready(function(){

    if($.trim($("#message").html()) != '')
    {
        $("#alertModal").modal("show");
    }
    


    });

    $('.archive').on('click', function()
     {
        var formData = { 
                'set_fields'        :   'status',
                'set_values'        :   'Inactive' ,
                'condition_field'   :   'department_id',
                'operator'          :   '=',
                'condition_value'   :   $(this).attr('id')
            };
            console.log(formData);
        $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '../../../Controller/Handler/Department_handler.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                            encode          : true,
                success     : function(data){console.log(data);},
                error       : function(data){console.log(data);}
            }).done(function(data) {

                // log data to the console so we can see
                console.log(data);
                var res = (data['success'] === false ? data['errors'] : data['message']);
                
                $('#message').text(res);
                $('#alertModal').modal('show');

                // here we will handle errors and validation messages
            });

     });

    $('.edit').on('keydown', function(event) {
        
        switch(event.keyCode){
           case 13:
            event.preventDefault();
            var formData = { 
                'set_fields'        :   'department',
                'set_values'        :   $(this).text(),
                'condition_field'   :   'department_id',
                'operator'          :   '=',
                'condition_value'   :   $(this).attr('id')
            };
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '../../../Controller/Handler/Department_handler.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                            encode          : true,
                success     : function(data){console.log(data);},
                error       : function(data){console.log(data);}
            }).done(function(data) {

                // log data to the console so we can see
                console.log(data);
                var res = (data['success'] === false ? data['errors'] : data['message']);
                
                $('#message').text(res);
                $('#alertModal').modal('show');

                // here we will handle errors and validation messages
            });
    
           break;
        }
     });
    
 