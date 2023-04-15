$(document).ready(function(){
    $('#upload-form').submit(function(e){
      e.preventDefault(); // prevent the form from submitting normally
  
      var formData = new FormData($(this)[0]);
  
      $.ajax({
        url: 'code.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
          $('#message').html(response);
        }
      });
    });
  });
  