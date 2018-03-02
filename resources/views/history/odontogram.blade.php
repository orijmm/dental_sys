<div class="row">
  <div id="odonto_1" class="col-md-6 text-right">
  </div>
  <div id="odonto_2" class="col-md-6">
  </div>
</div>
<div class="row">
  <div id="odonto_3" class="col-md-6  text-right">
  </div>
  <div id="odonto_4" class="col-md-6">
  </div>
</div> 
<div style="border-bottom: 1px solid #000; margin:20px;"></div>
<div class="row">
  <div id="odonto_5" class="col-md-6 text-right">
  </div>
  <div id="odonto_6" class="col-md-6">
  </div>
</div>
<div class="row">
  <div id="odonto_7" class="col-md-6 text-right">
  </div>
  <div id="odonto_8" class="col-md-6">
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  //get all teeth parameters that have same odontogram_id
  $.get("{{route('data.teeths',$history->id)}}", function(data, status){
  var datos = [];
  var loop = 1;
  //make multiarray with different size lenght - for style purpose
  datos[0] = data.teeth.slice(0,8);
  datos[1] = data.teeth.slice(8,16);
  datos[2] = data.teeth.slice(16,21);
  datos[3] = data.teeth.slice(21,26);
  datos[4] = data.teeth.slice(26,31);
  datos[5] = data.teeth.slice(31,36);
  datos[6] = data.teeth.slice(36,44);
  datos[7] = data.teeth.slice(44,52);
  //loop throught array calling function adddiv
  for (var i = 0; i < datos.length; i++) {
    addDiv(datos[i],loop);
      loop++;
    }
  });
});  
</script>
