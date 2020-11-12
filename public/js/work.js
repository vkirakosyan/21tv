var div_abs = null 
var new_tag = null
var control=false
$(document).ready(function(){
$(".work-more-button").click(function(){
if(control) return
    control=true
    if(div_abs){
        var __self = $(this).parent()
        var data_id = $(this).parent().attr('data-id');
        div_abs.animate({'margin-bottom': '0px'},500,()=>{
        });
        close (div_abs.attr('data-id'), ()=>{
                if(div_abs.attr('data-id') != data_id){
                     __self.animate({'margin-bottom': '315px'},500,()=>{
                    });
                    open (data_id,()=>{
                            div_abs = __self;
                            control=false
                        });
                } else {
                   div_abs = null
                   control=false
                }
            })
        console.log('if open')
    } else {
        var __self = $(this).parent()
        var data_id = $(this).parent().attr('data-id');
        __self.animate({'margin-bottom': '315px'},500,()=>{
            
        })
        open (data_id,()=>{
                div_abs = __self;
                control=false
            });
     
    }

});
function open (id,f) {
    $(".toggle_container[data-id ="+id+"]").css('display','block')
    var position = $(".work-more-button[data-id ="+id+"]").parent().position()
    position.top+=380
    $(".toggle_container[data-id ="+id+"]").css('top', position.top)
    $(".work-more[data-id ="+id+"]").animate({'height': '300px', 'padding-top' : '80px', 'padding-bottom' : '80px'},500,()=>{
        f();
    })
}
function close (id,f) {
    $(".work-more[data-id ="+id+"]").animate({'height': '0px','padding-top' : '0px','padding-bottom' : '0px'},500,function (){
        f();
        $(".toggle_container[data-id ="+id+"]").css('display','none')
    })
}
});

function shareOverrideOGMeta(overrideLink, overrideTitle, overrideDescription, overrideImage)
{
FB.ui({
    method: 'share_open_graph',
    action_type: 'og.likes',
    action_properties: JSON.stringify({
        object: {
            'og:url': overrideLink,
            'og:title': overrideTitle,
            'og:description': overrideDescription,
            'og:image': overrideImage
        }
    })
},
function (response) {
// Action after response
});
}








