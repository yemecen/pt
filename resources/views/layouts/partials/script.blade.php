<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){

    $('input[type="file"]').change(function(e){

        var selectedFiles = e.target.files;
        
        $(".container-fluid>.row>.col-md-10>form>.form-group>p").empty();

        $.each(selectedFiles, function( index, file ) {
          
          console.log( index+1 + ": " + file.name );

          $(".container-fluid>.row>.col-md-10>form>.form-group>p").append("<span class='badge badge-warning'>"+file.name+"</span><br>");
        
        });

    });


    $('#olusturan').change(function () {
      this.form.submit();
    });

    $('#modul').change(function () {
      this.form.submit();
    });

    $('#sorumlu').change(function () {
      this.form.submit();
    });

    $('#oncelik').change(function () {
      this.form.submit();
    });

    $('#durum').change(function () {
      this.form.submit();
    });

})
</script>