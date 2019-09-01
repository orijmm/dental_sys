/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CURRENT_URL = window.location.href.split('?')[0],
    $BODY = $('body'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $NAV_MENU = $('.navbar-header'),
    $FOOTER = $('footer');

$(document).ready(function() {
    $('#datatable-responsive').DataTable({
      "searching": false,
      "paging": false,
      "bInfo": false,
    }); 
});

$(document).ready(function() {
    $('#table-1').DataTable({
       "columnDefs": [
            {"width": "20%", "targets":1}
          ]
    }); 
});

$(document).ready(function() {
    $('#table-2').DataTable({
        "paging": false,
    }); 
});

// plugin
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // ========================================================================
    //  Bootstrap Tooltips and Popovers
    // ========================================================================

    if ($('.tooltiped').length) {
        $('.tooltiped').tooltip();
    }

    if ($('.popovered').length) {
        $('.popovered').popover({
            'html': 'true'
        });
    }

    // Making Bootstrap Popover Hovered

    if ($('.popover-hovered').length) {
        $('.popover-hovered').popover({
            trigger: 'hover',
            'html': 'true',
            'placement': 'top'
        });
    }

    // ========================================================================
    //  Togglers
    // ========================================================================

    // toogle sidebar
    $('.left-toggler').click(function (e) {
        $(".responsive-admin-menu").toggleClass("sidebar-toggle");
        $(".content-wrapper").toggleClass("main-content-toggle-left");
        e.preventDefault();
    });

    // We should listen touch elements of touch devices
    $('.smooth-overflow').on('touchstart', function (event) {});

    // toogle sidebar
    $('.right-toggler').click(function (e) {
        $(".main-wrap").toggleClass("userbar-toggle");
        e.preventDefault();
    });

    // toogle chatbar
    $('.chat-toggler').click(function (e) {
        $(".chat-users-menu").toggleClass("chatbar-toggle");
        e.preventDefault();
    });

    // Toggle Chevron in Bootstrap Collapsible Panels
    $('.btn-close').click(function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().fadeOut();
    });

    $('.btn-minmax').click(function (e) {
        e.preventDefault();
        var $target = $(this).parent().parent().next('.panel-body');
        if ($target.is(':visible')) $('i', $(this)).removeClass('fa fa-chevron-circle-up').addClass('fa fa-chevron-circle-down');
        else $('i', $(this)).removeClass('fa-chevron-circle-down').addClass('fa fa-chevron-circle-up');
        $target.slideToggle();
    });

    // ========================================================================
    //  Keep open Bootstrap Dropdown on click
    // ========================================================================

    $('.keep_open').click(function (event) {
        event.stopPropagation();
    });

    // ========================================================================
    //  Sign Out Modal
    // ========================================================================            


    $(".goaway").click(function (e) {
        e.preventDefault();
        $('#signout').modal();
        $('#yesigo').click(function () {
            window.open($('.goaway').data('url'), '_self');
            $('#signout').modal('hide');
        });
    });

    // ========================================================================
    //  Scroll To Top
    // ========================================================================

    $('.smooth-overflow').on('scroll', function () {

        if ($(this).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });

    $('.scroll-top-wrapper').on('click', scrollToTop);

    function scrollToTop() {
        var verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        var element = $('body');
        var offset = element.offset();
        var offsetTop = offset.top;
        $('.smooth-overflow').animate({
            scrollTop: offsetTop
        }, 400, 'linear');
    }

});
// /plugin

// ========================================================================
//  Left Responsive Menu
// ========================================================================   

$(document).ready(function () {

    // Responsive Menu//
    $(".responsive-menu").click(function () {
        $(".responsive-admin-menu #menu").slideToggle();
    });
    $(window).resize(function () {
        $(".responsive-admin-menu #menu").removeAttr("style");
    });

(function multiLevelAccordion($root) {

    var $accordions = $('.accordion', $root).add($root);
    $accordions.each(function () {

        var $this = $(this);
        var $active = $('> li > a.submenu.active', $this);
        $active.next('ul').css('display', 'block');
        $active.addClass('downarrow');
        var a = $active.attr('data-id') || '';

        var $links = $this.children('li').children('a.submenu');
        $links.click(function (e) {
            if (a !== "") {
                $("#" + a).prev("a").removeClass("downarrow");
                $("#" + a).slideUp("fast");
            }
            if (a == $(this).attr("data-id")) {
                $("#" + $(this).attr("data-id")).slideUp("fast");
                $(this).removeClass("downarrow");
                a = "";
            } else {
                $("#" + $(this).attr("data-id")).slideDown("fast");
                a = $(this).attr("data-id");
                $(this).addClass("downarrow");
            }
            e.preventDefault();
        });
    });
})($('#menu'));

// Responsive Menu Adding Opened Class//

$(".responsive-admin-menu #menu li").hover(
    function () {
        $(this).addClass("opened").siblings("li").removeClass("opened");
    },
    function () {
        $(this).removeClass("opened");
    }
);

});

// Switchery
$(document).ready(function() {
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#5bc0de'
            });
        });
    }
});
// /Switchery


/**
 * script general
 * 
 */

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

//delete register
$(document).on('click', '.btn-delete', function () {
    $('[data-toggle="tooltip"]').tooltip('hide');
    var $this = $(this);
    //var row = $this.closest('tr');
    swal({   
        title: $this.attr('title'),   
        text: $this.data('confirm-text'),   
        type: "warning",   
        showCancelButton: true,   
        cancelButtonText: lang.cancel,
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: $this.data('confirm-delete'),   
        closeOnConfirm: true },
        function(isConfirm){   
            if (isConfirm) {
                showLoading(); 
                $.ajax({
                    type: 'DELETE',
                    url: $this.data('href'),
                    dataType: 'json',
                    //data: { 'id': $this.data('id') },
                    success: function (response) { 
                        hideLoading();                          
                        if(response.success) {  
                            notify('success', response.message);
                            getPages(CURRENT_URL);
                        } else {
                            notify('error', response.message);
                        }
                    },
                    error: function (status) {
                        hideLoading();
                        notify('error', status.statusText);
                    }
                });     
        } 
    });
});

var current_model = null;
var current_title = null;
//open create show or edit in modal or content
$(document).on('click', '.create-edit-show', function () {
    showLoading();
    $('[data-toggle="tooltip"]').tooltip('hide');
    var $this = $(this);
    var title = $this.attr("title");
    current_model = $this.data('model');
    $.ajax({
        url: $this.data('href'),
        type:'GET',
        success: function(response) {
            hideLoading();
            if(response.success){
                if(current_model == 'modal') {
                    $('#modal-title').text(title);
                    $('#content-modal').html(response.view);
                    $('#general-modal').modal('show');
                } else {
                    $('.top_search').hide();
                    $('.btn-create').hide();
                    current_title = $('#content-title').text();
                    $('#content-title').text(title);
                    $('#content-table').html(response.view);
                }
            } else {
                notify('error', response.message);
            }
        },
        error: function (status) {
            hideLoading();
            notify('error', status.statusText);
        }
    });
});
//save or update form modal
$(document).on('click', '.btn-submit', function (e) {
    e.preventDefault();
    showLoading();
    var form = $('#form-modal'); 
    var type = $('#form-modal input[name="_method"]').val();
    var odonto = $(this).data('odonto');

    if(typeof type == "undefined") {
        type = form.attr('method');
    }
    $.ajax({
        url: form.attr('action'),
        type: type,
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
            hideLoading();

            if(response.success){
                if(current_model == 'modal') {
                    $('#general-modal').modal('hide');
                } else {
                    if(response.url_return) {
                        showLoading();
                        window.location.href = response.url_return;
                    } else {
                        if(current_model == 'content') {
                            $('#content-title').text(current_title);
                            $('.btn-create').show();
                            $('.top_search').show();
                        }
                    }
                }
                notify('success', response.message);
                form.get(0).reset();
                if (odonto == 'modal') {
                $('#content-table').hide().html(response.view).fadeIn(1500);
                } else {
                    getPages(CURRENT_URL);
                }
            } else {
                if(response.validator) {
                  var message = '';
                  $.each(response.message, function(key, value) {
                    message += value+' ';
                  });
                  notify('error', message);
                } else {
                  notify('error', response.message);
                }
            }
           
        },
        error: function (status) {
            
            hideLoading();
            notify('error', status.statusText);
        }
    });
});

//cancel return page old
$(document).on('click', '.btn-cancel', function (e) {
    e.preventDefault();
    getPages(CURRENT_URL);
    $('#content-title').text(current_title);
    $('.btn-create').show();
    $('.top_search').show();
});

//reset search
$(document).on('click', '.search-cancel', function (e) {
    e.preventDefault();
    getPages(CURRENT_URL);
    $('#search').val('');
    $(this).hide();
    loadResposiveTable();
});

// search register all
$(document).on('click', '.search', function () {
    showLoading();
    var term = $('#search').val();
    var $this = $(this);
    $('.search-cancel').show();
    if(term){
        $.ajax({
            url: CURRENT_URL,
            type:"GET",
            data:{ search: term},
            dataType: 'json',
            success: function(response) {
                hideLoading();
                if(response.success){
                        $('#content-table').html(response.view);
                    loadResposiveTable();
                } else {
                    notify('error', response.message);
                }
            },
            error: function (status) {
                hideLoading();
                notify('error', status.statusText);
            }
        });
    } else {
        hideLoading();
        notify('error', 'Ingrese un termino para la busqueda');
    }
});

// search history
$(document).on('click', '.searchhistory', function () {
    showLoading();
    var term = $('#term').val();
    var term2 = $('#term2').val();
    var opcion = $('#selectbasic').val();
    var $this = $(this);
    $('.search-cancel').show();
    if(term || term2){
        $.ajax({
            url: CURRENT_URL,
            type:"GET",
            data:{ search: term,search2: term2, opcion : opcion },
            dataType: 'json',
            success: function(response) {
                hideLoading();
                if(response.success){
                    $('#content-table').html(response.view);
                    loadResposiveTable();
                } else {
                    notify('error', response.message);
                }
            },
            error: function (status) {
                hideLoading();
                notify('error', status.statusText);
            }
        });
    } else {
        hideLoading();
        notify('error', 'Debe agregar un termino a la busqueda');
    }
});

// search status all
$(document).on('change', '#status', function () {
    showLoading();
    var $this = $(this);
    $.ajax({
        url: CURRENT_URL,
        type:"GET",
        data:{ status: $this.val() },
        dataType: 'json',
        success: function(response) {
            hideLoading();
            if(response.success){
                $('#content-table').html(response.view);
                loadResposiveTable();
            } else {
                notify('error', response.message);
            }
        },
        error: function (status) {
            hideLoading();
            notify('error', status.statusText);
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getPages($(this).attr('href'));
        e.preventDefault();
    });
});

function getPages(page) {
    showLoading();
    $.ajax({
        url: page,
        type:"GET",
        dataType: 'json',
        success: function(response) {
            hideLoading();
            if(response.success){
                $('#content-table').html(response.view);
                loadResposiveTable();
                CURRENT_URL = page;
            }
        },
        error: function (status) {
            hideLoading();
            console.log('status.statusText');
        }
    });
}

function notify(type, message){
    new PNotify({
      text: message,
      type: type,
      hide: true,
      styling: 'bootstrap3'
    });
}

// datatable-responsive
function loadResposiveTable() {
   
    $('#datatable-responsive').DataTable({
      "destroy": true,  
      "searching": false,
      "paging": false,
      "bInfo": false,
    });

}

$(document).on('change', '#file_image', function () { 
    showLoading();
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
    hideLoading();
});


function showLoading() {
    $('#loading').addClass('is-active');
}

function hideLoading() {
    $('#loading').removeClass('is-active'); 
}

$(document).ready(function() {

  $('form').keypress(function(e){   
    if(e == 13){
      return false;
    }
  });

  $('input').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

});
// /script general
$(document).on('change', '#selectbasic', function(){
    if ($(this).val() == 2) {
        $('#term2').removeClass('hide');
        $('#term').hide();
    } else {
        $('#term2').addClass('hide');
        $('#term').show();
    }
});

//odonto
function getBackground(allC)
{
    
  switch(allC){
    case 0:
    image = 'back_odo.jpg'; 
    break;
    case 4:
    image = 'sellante.jpg'; 
    break;
    case 5:
    image = 'sellante_in.jpg'; 
    break;
    case 6:
    image = 'extra_in.jpg';
    break;
    case 7:
    image = 'con_endo.jpg';
    break;
    case 8:
    image =  'protesis.jpg';
    break;
    case 9:
    image =  'necro_pul.jpg';
    break;
    case 10:
    image =  'protesi_in.jpg';
    break;
    case 11:
    image =  'clini_au.jpg';
    break;
  }
  return image;
}

function getColorOdo(cColor)
{
  switch(cColor){
    case 0:
    color = '16px  solid rgba(255,130,255,0.1)';
    break;
    case 1:
    color = '16px  solid #d24d33';
    break;
    case 2: 
    color = '16px  solid  #3b8dbd';
    break;
    case 3:
    color = '16px  solid #333333';
    break;
  }
  return color;
}

function getColorC(cColor)
{
  switch(cColor){
    case 0:
    color = '#FFFFFF';
    break;
    case 1:
    color = '#d24d33';
    break;
    case 2: 
    color = '#3b8dbd';
    break;
    case 3:
    color = '#333333';
    break;
  }
  return color;
}

function addDiv(datarray,loop)
{   
    console.log('dataarray'+datarray);
    console.log('lopp'+loop);
  var urlteeth = $('#urlteeth').val();
  console.log('urlteeth'+urlteeth);
  //loop throught all teeth
  for (var i = 0; i < datarray.length; i++) {
    //create 3 div and add id with each teeth (52 times) 
    var odonto_back = $(document.createElement('div')); //all_c
    var odonto_outer = $(document.createElement('div'));//sides of the circle
    var odonto_inner = $(document.createElement('div'));// small circle in the middle
    console.log('datdaid'+datarray[i].id);
    odonto_back.attr('id','circle_odonto_back_'+datarray[i].id);
    odonto_back.addClass('create-edit-show');
    odonto_back.attr('data-model','modal');
    odonto_back.attr('title','Editar odontograma');
    odonto_back.attr('data-toggle','tooltip');
    odonto_back.attr('data-href',urlteeth+'/'+datarray[i].id);
    odonto_outer.attr('id','circle_odonto_outer_'+datarray[i].id);
    odonto_inner.attr('id','circle_odonto_inner_'+datarray[i].id);

    if (datarray[i].all_c === 0) {
        console.log('c2'+datarray[i].c2);
       odonto_back.css({'cursor': 'pointer','background-image': 'url(../public/assets/images/back_odo.jpg)','width':'32px','height': '32px', '-moz-border-radius': '32px','-webkit-border-radius': '32px','border-radius': '32px','background-size':'contain','display':'inline-block'});
       odonto_outer.css({'width':'0','height':'0','border-right': getColorOdo(datarray[i].c2),'border-top': getColorOdo(datarray[i].c1),'border-left': getColorOdo(datarray[i].c4),'border-bottom': getColorOdo(datarray[i].c3),'-moz-border-radius': '50%','-webkit-border-radius': '50%','border-radius': '50%'});
       odonto_inner.css({'width': '16px','height': '16px','background': getColorC(datarray[i].c5),'-moz-border-radius': '50%','-webkit-border-radius': '50%', 'border-radius': '50%', 'top': '50%','left': '50%','margin': '-08px 0px 0px -08px', 'border': '1px solid #000'});
    } else {
        console.log('all_c'+datarray[i].all_c);
      odonto_back.css({'background-image': 'url(../public/assets/images/'+getBackground(datarray[i].all_c)+')','width':'32px','height': '32px', '-moz-border-radius': '32px','-webkit-border-radius': '32px','border-radius': '32px','background-size':'contain','display':'inline-block'});      
    }

    $('#odonto_'+loop).append(odonto_back);
    $('#circle_odonto_back_'+datarray[i].id).append(odonto_outer);
    $('#circle_odonto_outer_'+datarray[i].id).append(odonto_inner);
  }
}

$(document).on('click','.odonto_teeth',function(){
    var odoc = $(this).data('odoc');
    $('.odonto_teeth').removeClass('active');
    $(this).addClass('active');
    $('#inputone').val(odoc);
});

$(document).on('change','#elect_odonto',function(){
    var selec_odonto = parseInt($(this).val());
    var gball = $('.gb_all');
    if (selec_odonto > 3) {
        $('.table_odonto').hide();
        gball.show();
        gball.css({'background-repeat': 'no-repeat','width':'80px','height':'80px','background-image':'url(../public/assets/images/'+getBackground(selec_odonto)+')'});
    } else {
        $('.table_odonto').show();
        gball.hide();
    }
});

// changebill
$(document).on('click', '.change_bill', function () {
    showLoading();
    var url = $(this).data('url');
    var saleid = $(this).data('id');
    $.ajax({
        url: url,
        type:"GET",
        data:{ id:  saleid},
        dataType: 'json',
        success: function(response) {
            if(response.success){
                $('#content-table').html(response.view);
                loadResposiveTable();
                notify('success', response.message);
            } else {
                notify('error', response.message);
            }
            hideLoading();
        },
        error: function (status) {
            hideLoading();
            notify('error', status.statusText);
        }
    });
});

// changecharged
$(document).on('click', '.change_charged', function () {
    showLoading();
    var url = $(this).data('url');
    var saleid = $(this).data('id');
    $.ajax({
        url: url,
        type:"GET",
        data:{ id:  saleid},
        dataType: 'json',
        success: function(response) {
            if(response.success){
                $('#content-table').html(response.view);
                loadResposiveTable();
                notify('success', response.message);
            } else {
                notify('error', response.message);
            }
            hideLoading();
        },
        error: function (status) {
            hideLoading();
            notify('error', status.statusText);
        }
    });
});
