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
    $('#table-2').DataTable(); 
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
                getPages(CURRENT_URL);
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
            data:{ search: term, opcion : opcion },
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
                console.log('maaaa');
            }
        });
    } else {
        //
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
                console.log('maaaa');
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
            console.log(status.statusText);
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