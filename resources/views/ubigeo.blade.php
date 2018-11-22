

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hello, world!</title>
  </head>
  <body>

        <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Seleccione Regiones</label>
  <div class="col-md-4">
    <select id="selectreg" name="selectreg" class="form-control">
      @foreach($region as $regiones)
      <option value="{{ $regiones->id}}">{{ $regiones->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectprov">Provincia</label>
  <div class="col-md-4">
    <select id="selectprov" name="selectprov" class="form-control">
  
    </select>
  </div>
</div>

<script type="text/javascript">
// Me busca las provincias por Region
$( "#selectreg" ).change(function() {
 // alert($("#selectreg" ).val());
 codreg = $("#selectreg" ).val();
 var data = {varcodreg:codreg };

  $.ajax({
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('BuscaProvincias') }}",
                    dataType: 'json',
                    data: data,
                    }).done(function(data){ //200

                      $('#selectprov').empty();

                     $.each(data.provincias,function(key, registro) {
        $('#selectprov').append('<option value='+registro.id+'>'+registro.name+'</option>');
      });  
                
                    }).fail(function () { ///aqca
                    // alert("Error");
               }); 


});
</script>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectdist">Distrito</label>
  <div class="col-md-4">
    <select id="selectdist" name="selectdist" class="form-control">
      <option value="1">Option one</option>
      <option value="2">Option two</option>
    </select>
  </div>
</div>

<script type="text/javascript">
  $( "#selectdist" ).change(function() {
// alert('Hola');
 codreg = $("#selectreg" ).val();
 codprov = $("#selectprov" ).val();
 var data = {varcodreg:codreg, varcodprov:codprov };
  $.ajax({
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('BuscaDistritos') }}",
                    dataType: 'json',
                    data: data,
                    }).done(function(data){ //200

                
                    }).fail(function () { ///aqca
                    // alert("Error");
               }); 


  });

  
</script>




</fieldset>
</form>








  </body>
</html>
































