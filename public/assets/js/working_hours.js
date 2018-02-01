function add_working_hour() {

  var input = document.createElement("input");
  var tr    = document.createElement("TR");
  var td    = document.createElement("TD");  

  input.type  = 'text';
  input.name  = 'start[]';
  input.className = 'form-control datetime', 
  input.setAttribute('required', 'required');
  input.setAttribute('readonly', 'readonly');
  input.id = count;

  var input1 = document.createElement("input");
  var td1    = document.createElement("TD");

  input1.type  = 'text';
  input1.name  = 'end[]';
  input1.className = 'form-control datetime',
  input1.id = 'end-'+count;
  input1.setAttribute('required', 'required');
  input1.setAttribute('readonly', 'readonly');

  var input2 = document.createElement("input");
  var td2    = document.createElement("TD");

  input2.type  = 'number';
  input2.name  = 'quantity[]';
  input2.className = 'form-control',
  input2.setAttribute('required', 'required');

  var select3 = document.createElement("select");
  var td3    = document.createElement("TD");

  select3.name  = 'status[]';
  select3.className = 'form-control',
  $.each(select_option, function(index, value) { 
    var option = document.createElement("option");
    option.value = index;
    option.text = value;
    select3.appendChild(option);
  });

  var td4    = document.createElement("TD");

  button               = document.createElement('button');
  button.className     = 'btn btn-round btn-danger btn-xs delete-hour';

  var icon               = document.createElement('i');
  icon.style.cursor  = 'pointer';
  icon.className     = 'fa fa-trash';
  
  button.appendChild(icon);

  td.appendChild(input);
  td1.appendChild(input1);
  td2.appendChild(input2);
  td3.appendChild(select3);
  td4.appendChild(button);

  tr.appendChild(td); 
  tr.appendChild(td1); 
  tr.appendChild(td2); 
  tr.appendChild(td3);
  tr.appendChild(td4); 

  container = document.getElementById('working_hours_list');
  container.appendChild(tr); 

  $("#"+count).datetimepicker({
    format: 'LT',
    ignoreReadonly: true
  });

  $("#end-"+count).datetimepicker({
    format: 'LT',
    ignoreReadonly: false
  });

  $("#"+count).on("dp.change", function(e) {
    var id = $(this).attr('id');
    $("#end-"+id).data('DateTimePicker').date(e.date.add(1, 'hours'));
  });

  count++;

}

function add_delivery_time() {

  var input = document.createElement("input");
  var tr    = document.createElement("TR");
  var td    = document.createElement("TD");  

  input.type  = 'text';
  input.name  = 'interval[]';
  input.className = 'form-control', 
  input.setAttribute('required', 'required');

  var select1 = document.createElement("select");
  var td1    = document.createElement("TD");

  select1.name  = 'published[]';
  select1.className = 'form-control',
  $.each(select_delivery, function(index, value) { 
    var option = document.createElement("option");
    option.value = index;
    option.text = value;
    select1.appendChild(option);
  });

  var td2    = document.createElement("TD");

  button               = document.createElement('button');
  button.className     = 'btn btn-round btn-danger btn-xs delete-delivery';

  var icon               = document.createElement('i');
  icon.style.cursor  = 'pointer';
  icon.className     = 'fa fa-trash';
  
  button.appendChild(icon);

  td.appendChild(input);
  td1.appendChild(select1);
  td2.appendChild(button);

  tr.appendChild(td); 
  tr.appendChild(td1); 
  tr.appendChild(td2); 

  container = document.getElementById('delivery_hours_list');
  container.appendChild(tr); 

}

$(document).on('click', '.delete-hour', function () {
    var row = $(this).closest('tr');
    row.remove();
});

$(document).on('click', '.delete-delivery', function () {
    var row = $(this).closest('tr');
    row.remove();
});

for(i=0; i < count; i++) {
  $("#"+i).datetimepicker({
    format: 'LT',
    ignoreReadonly: true,
    widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
  });

  $("#end-"+i).datetimepicker({
    format: 'LT',
    ignoreReadonly: false
  });

  $("#"+i).on("dp.change", function(e) {
      var id = $(this).attr('id');
      $("#end-"+id).data('DateTimePicker').date(e.date.add(1, 'hours'));
  });
}

  $("#time_close").datetimepicker({
    format: 'LT',
    ignoreReadonly: true
  });

