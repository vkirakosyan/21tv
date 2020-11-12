$(document).ready(function(){
     var states = [];
    var alreadyFilled = false;
   

    function initDialog() {
        clearDialog();
        for (var i = 0; i < states.length; i++) {
            $('.dialog').append('<div>' + states[i].name + '</div>');
        }
    }
    function clearDialog() {
        $('.dialog').empty();
    }
    $('.autocomplete input').click(function() {
        if (!alreadyFilled) {
            $('.dialog').addClass('open');
        }

    });
    $('body').on('click', '.dialog > div', function() {
        $('.autocomplete input').val($(this).text()).focus();
        $('.autocomplete .close').addClass('visible');
        alreadyFilled = true;
        $('#programme').val($('#programme_text').val())
    });
    $('.autocomplete .close').click(function() {
        alreadyFilled = false;
        $('.dialog').addClass('open');
        $('.autocomplete input').val('').focus();
        $(this).removeClass('visible');
    });

    function match(str) {
        str = str.toLowerCase();
        clearDialog();
        for (var i = 0; i < states.length; i++) {
            if (states[i].name.toLowerCase().startsWith(str)) {
                $('.dialog').append('<div>' + states[i].name + '</div>');
            }
        }
    }
    $('.autocomplete input').on('input', function() {
        $('.dialog').addClass('open');
        alreadyFilled = false;
        match($(this).val());
    });
    $('body').click(function(e) {
        if (!$(e.target).is("input, .close")) {
            $('.dialog').removeClass('open');
        }
    });
    initDialog();


// dropdown
function f(i){
$(function() {
  
    $('.dropdown-'+i+' > .caption').on('click', function() {
      $(this).parent().toggleClass('open');
    });
    
    $('.dropdown-'+i+'> .list > .item').on('click', function() {
      $('.dropdown-'+i+'> .list > .item').removeClass('selected');
      $(this).addClass('selected').parent().parent().removeClass('open').children('.caption').text( $(this).text() ).attr('data-type', $(this).attr('data-type') );
      switch($(this).parent().attr('id')){
        case 'day':
            $('input#day').val($(this).text())
        break
        case 'month':
            $('input#month').val($(this).attr('data-type'))
        break
        case 'year':
            $('input#year').val($(this).text())
        break
      }
    });
    
    $(document).on('keyup', function(evt) {
      if ( (evt.keyCode || evt.which) === 27 ) {
        $('.dropdown-'+i+'').removeClass('open');
      }
    });
    
    $(document).on('click', function(evt) {
      if ( $(evt.target).closest(".dropdown-"+i+"> .caption").length === 0 ) {
        $('.dropdown-'+i+'').removeClass('open');
      }
    });
    
  });
}
for(let i=1;i<4;i++){
   f(i);
}
$('#programme_text').change(function(){
    $('#programme').val($('#programme_text').val())
})
var ajax;
$('#programme_text').keyup(function () {
if($('#programme_text').val() != '')
        send_ajax();
})

function send_ajax (){
     if(ajax) {
        ajax.abort();
    }
    ajax = $.ajax({
                url: "/search/archiv",
                data: {search: $('#programme_text').val() , _token: $('input[name="_token"]').val() },
                method:'post',
                success: function(result){
                    states = result
                    initDialog()
                }
            });
    }
})
