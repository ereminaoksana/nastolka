$(document).ready(function () {
   $(".prinyat").click(function () {
       var num = $(this).parent().attr('num');
       var th = $(this);

       $.ajax({
           type: "post",
           url: "for_ajax/prinuch.php",
           data: {num: num},
           success: function (data) {
                alert(data);
               location.reload();

           }

       })

   });
});