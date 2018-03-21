$(document).ready(function(){
$("#clstodo").hide();
    client_details();



   $('#addexpe').click(function(){
             $('#save').show();
             $('#update').hide();
            $('#myModal10').find('input:text').val(''); 
            $('#myModal10').find('textarea').val('');
           });
   

     $('.editexp').click(function(){         
             $('#save').hide();
             $('#update').show();

   });

 $('#modetype').change(function(){
                 if ($(this).val() == "DD") {
                        $("#DD").show();
                        if ($("#DD").val()=='') {

                        }
                    } else {
                        $("#DD").hide();
                    }

                    if ($(this).val() == "Cheque") {
                        $("#Cheque").show();
                    } else {
                        $("#Cheque").hide();
                    }
     }); 

     $('#ustatus').change(function(){
             if ($(this).val() == "t") {
                 $("#clstodo").show(750); 
                }

             else{
                 $("#clstodo").hide(750);
             }
             if ($(this).val() == "i") {
                 $("#nextdate").show(1000); 
                }

             else{
                 $("#nextdate").hide(1000);
             }
     }); 

     $('#tax1').change(function(){
         
         
         
         var id = $(this).children(":selected").attr("id");
             if (id == "0") {
                 $(".tax2").show(500);
                  $("#gst").val('9.00');
                  $("#gst").text('SGST 9.00%');
                 
                }
            if(id == "1"){

                  $(".tax2").show(500);
                  $("#gst").val('9.00');
                  $("#gst").text('CGST 9.00%');
             }
             if(id == "2"){
                 $(".tax2").hide(500);
                  $("#gst").val('0');
                  $("#gst").text('');
             }
             
     });      


   });

 function client_details(){

     $('#customer_id').change(function(){
        $("#details").empty();
        var name=$(this).find(':selected').attr('cname');
        var address=$(this).find(':selected').attr('company');
        var num=$(this).find(':selected').attr('number');
        var company=$(this).find(':selected').attr('caddress');
        var email=$(this).find(':selected').attr('email');

        $("div#details").append("<h4>CLIENT INFO</h4>");
        $("div#details").append("<p><strong>Name: </strong>"+ name +"</br> <strong>Company: </strong>"+ address +"</br><strong>Number: </strong>"+ num +"</br><strong>Email: </strong>"+ email +"</br><strong>Address:</strong>"+ company +"</p>");
        // $("div#details").append("<div class='pull-right'></div>");
        $("#chek").show(1000); 


    });
 }   

    function valueChanged(){
   if($("#clinttoggle").is(":checked"))  
       $("#clientdetails2").show(1000);
   else
       $("#clientdetails2").hide(1000);
}



