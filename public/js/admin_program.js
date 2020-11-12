  $( function() {
    $( ".sortable" ).sortable({
        stop:function(){
            $.map($(this).find('li'),function(el){
            	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var id=el.id;
                var index=$(el).index();
                $.ajax({
                    url:'/sortprogram',
                    method:'POST',
                    data: {_token: CSRF_TOKEN,id:id,index:index}

                })
            })
        }
    });
  } );