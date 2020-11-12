var user = "";
var useruuid = "";
var user_voting = "";
var answer = "";
var question = "";
var savebtn ;
var polls_data_first;
var polls_is_candidate_first;
var polls_data_last;
var polls_is_candidate_last;
var question_text = "";
var login_face = window.login_face;
var voting_text = window.voting_text;
var voting_text_error = window.voting_text_error;
$(document).ready(function(){
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '690390744676867',
              cookie     : true,  // enable cookies to allow the server to access 
                                  // the session
              xfbml      : true,  // parse social plugins on this page
              version    : 'v3.1' // use graph api version 2.8
            });

            // Now that we've initialized the JavaScript SDK, we call 
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.

            FB.getLoginStatus(function(response) {
              statusChangeCallback(response);
            });

      };

$('#navbar-scroll').on('show.bs.collapse', function () {
    $('body').css('overflow', 'hidden');
}).on('hide.bs.collapse', function () {
    $('body').css('overflow', 'auto');
});
if ($(document.body).height() < $(window).height()) {
    $('footer').attr('style', 'position: fixed!important; bottom: 0px;width:100%');
}
// searchbox
  $("header nav .btn").click(function(){
    $(".input").toggleClass("active").focus;
    $(this).toggleClass("animate");
    $(".input").val("");
  });  

// Thanks

// button disable & enable
$('.button-top11').click(function(){
    $('.button_enable_top11[type="button"]').removeAttr('disabled');
})

$('.button-top10').click(function(){
    $('.button_enable_top10[type="button"]').removeAttr('disabled');
})


    $('.remove_div textarea').keyup(function(){
        if($(this).val() != ""){
            $('.answer-btn').attr('disabled', false);
        } else {
            $('.answer-btn').attr('disabled', true);
        }
    })



// remove pool div and write thanks
$('#tab_first input[type="radio"]').on('click',function () {
    polls_data_first = $(this).attr('data-id')
    polls_is_candidate_first = $(this).attr('candidate')
});



// remove pool div and write thanks
$('#tab_last input[type="radio"]').on('click',function () {
    polls_data_last = $(this).attr('data-id')
    polls_is_candidate_last = $(this).attr('candidate')
});

    $('.button_enable_top11').click(function() {
        savebtn = $(this)
        savebtn.closest(".remove_div").html(login_face);
        $('.facebookStatus_top11').css({'display' : 'flex'});
        user_voting = 'top11';
    });

    $('.button_enable_top10').click(function() {
        savebtn = $(this)
        savebtn.closest(".remove_div").html(login_face);
        $('.facebookStatus_top10').css({'display' : 'flex'});
        user_voting = 'top10';
    });

    $('.button_enable_yes_or_no').click(function() {
        answer = {text: $(this).text(), id: $(this).attr('data-type')};
        question = {text: $('#yes_no_question').text(), id: $('#yes_no_question').attr('data-type')};
        savebtn = $(this);
        savebtn.closest(".remove_div").html(login_face);
        $('.yes_no').css({'display' : 'flex'});
        user_voting = 'yes_no';
    });
    $('.answer-btn').click(function() {
        answer = {text: $('#answer_text').val(), id: $(this).attr('data-type')}
        question_text = $('#question_text').text()
        savebtn = $(this)
        savebtn.closest(".remove_div").html(login_face);
        $('.text_answer').css({'display' : 'flex'});
        user_voting = 'text_answer';
    });                  

//   ----- Tabs -----
	$('.tabs .tab-links a').on('click', function(e) {
		var currentAttrValue = $(this).attr('href');

		// Show/Hide Tabs
        $('.tabs ' + currentAttrValue).siblings().slideUp(400);
        $('.tabs ' + currentAttrValue).delay(400).slideDown(400);
        
		// Change/remove current tab to active
		$(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});
var this_search_input
    function search_request (page, string) {
        $.ajax({
            url: "/search/"+page,
            data: {search: string, _token: $('input[name="_token"]').val() },
            method:'post',
            success: function(result){
                var content = '<div>'+
                '<button type="button" class="close close_new_search" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>';
                if(result['category'] !== undefined){
                    for (l = 0; l < result['category'].length; l++){
                        content+= "<div class='search-category'><h3>"+window.cotegoryName[result['category'][l]]+"</h3></div>"
                        for (i = 0; i < result['data'][result['category'][l]].length; i++){
                            content += '<div class="hover-red">'
                            content += '<a href="'+result['return_page'][result['category'][l]]+((result['data'][result['category'][l]][i].programme_id) ? (result['data'][result['category'][l]][i].programme_id+'/'+result['data'][result['category'][l]][i].id+'/'+window.cotegoryName['language']) : (result['data'][result['category'][l]][i].id+'/'+window.cotegoryName['language']))+'">';
                            content += '<h4>' + result['data'][result['category'][l]][i].title + '</h4>';
                            content += '</a>';
                            content += '<p>' + result['data'][result['category'][l]][i].description ;
                            content += ' <a href="'+result['return_page'][result['category'][l]]+(result['data'][result['category'][l]][i].programme_id?result['data'][result['category'][l]][i].programme_id+'/'+result['data'][result['category'][l]][i].id+'/'+window.cotegoryName['language'] : result['data'][result['category'][l]][i].id)+'/'+window.cotegoryName['language']+'"> <span class="dots">...</span></a>';
                            content +=  '</p>';
                            content += '</div>';
                        }
                        if(result['data'][result['category'][l]].length == 0) {
                            content += '<span>...</span>';
                        }
                    }
                    content += '</div>';
                } else {
                    for (i = 0; i < result['data'].length; i++){
                        content += '<div class="hover-red">';
                        content += '<a href="'+result['return_page']+ (result['data'][i].programme_id ? (result['data'][i].programme_id+'/'+result['data'][i].id+'/'+window.cotegoryName['language']) : (result['data'][i].id+'/'+window.cotegoryName['language']))+'">';
                        content += '<h4>' + result['data'][i].title + '</h4>';
                        content += '</a>';
                        content += '<p>' + result['data'][i].description ;
                        content += ' <a href="'+result['return_page']+(result['data'][i].programme_id?result['data'][i].programme_id+'/'+result['data'][i].id+'/'+window.cotegoryName['language'] : result['data'][i].id+'/'+window.cotegoryName['language'])+'"> <span class="dots">...</span></a>';
                        content +=  '</p>';
                        content += '</div>';
                    }
                    if(result['data'].length == 0) {
                        content += '<span>...</span>';
                    }
                    content += '</div>';
                }
                $("#search_result").html(content);
                $('.hover-red a h4').each(function (a, obj){
                    var re = new RegExp(this_search_input.val(), "g");
                    var str = $(obj).text().replace(re,'<span class="black-str">'+this_search_input.val()+'</span>')
                    $(obj).html(str)
                })
                $('.hover-red p').each(function (a, obj){
                    var re = new RegExp(this_search_input.val(), "g");
                    var str = $(obj).text().replace(re,'<span class="black-str">'+this_search_input.val()+'</span>')
                    $(obj).html(str)
                })
                
                $(".search_pages").css({'opacity': 1, 'display': 'block', 'z-index': 1})
            }
        });
    }
    var search_start;

    $('#txtSearch1').on('keyup', function () {
        this_search_input = $('#txtSearch1')
        var search_input = $(this)
        $(".search_pages").css({'opacity': 0, 'display': 'none', 'z-index': 0})
        if($(this).val() !== '') {
            clearTimeout(search_start);
            search_start = setTimeout(function (){
                var page = search_input.attr('search-page');
                var string = search_input.val();
                search_request (page, string);
            },1000);
        }

    })
    $('#txtSearch2').on('keyup', function () {
    this_search_input = $(this)
        var search_input = $(this)
        $(".search_pages").css({'opacity': 0, 'display': 'none', 'z-index': 0})
        if($(this).val() !== '') {
            clearTimeout(search_start);
            search_start = setTimeout(function (){
                var page = search_input.attr('search-page');
                var string = search_input.val();
                search_request (page, string);
            },1000);
        }

    })
$('#search_B').on('click', function () {
    this_search_input = $('#txtSearch2')
        var search_input = $('#txtSearch2')
        $(".search_pages").css({'opacity': 0, 'display': 'none', 'z-index': 0})
        if(search_input.val() !== '') {
            clearTimeout(search_start);
            search_start = setTimeout(function (){
                var page = search_input.attr('search-page');
                var string = search_input.val();
                search_request (page, string);
            },1000);
        }

    })
    $(document).on('click','.close_new_search span',function (){
        $(".search_pages").css({'opacity': 0, 'display': 'none'})
    })


    

    
});
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

function checkLoginState() {
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      }

function statusChangeCallback(response) {

        if (response.status === 'connected') {

          useruuid = response.authResponse && response.authResponse.userID
          testAPI();
        } else {

        }
    };
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

    function testAPI() {
        FB.api('/me', function(response) {
            user = response.name;
         
            switch (user_voting){
                case "yes_no":
                    $.ajax({
                        url: "/yes_or_no",
                        data: {question: question.id ,answer: answer.id, _token: $('input[name="_token"]').val(), name : user, 'useruuid': useruuid},
                        method:'post',
                        success: function(result){
                            if(result[0] == 'yes_or_no'){
                                $(".yes_no > .facebookBlock").html(voting_text_error);
                                $(".yes_no > .facebookBlock").closest('.zoom').find('.remove_div').html("");
                            } else {
                                $(".yes_no > .facebookBlock").html(voting_text);
                                $(".yes_no > .facebookBlock").closest('.zoom').find('.remove_div').html("");
                            }
                            $('.yes_no').css('background-image', 'url('+result[1]+')')
                            $('.yes_no').find('.facebook').click(() => shareOverrideOGMeta(window.location.href, question.text, answer.text, result[1] ))
                        }
                    });
                    break;
                case "top11":
                    $.ajax({
                        url: "/polls_answer",
                        data: {type: 'first' , condidate: polls_is_candidate_first, polls_id: polls_data_first, _token: $('input[name="_token"]').val(), name : user, 'useruuid': useruuid, 'type': 'top10' },
                        method:'post',
                        success: function(result){
                            if(result[0] == 'yes_or_no'){
                                $(".top11 > .facebookBlock").html(voting_text_error);
                                $(".top11 > .facebookBlock").closest('.tab').find('.remove_div').html("");
                            } else {
                                $(".top11 > .facebookBlock").html(voting_text);
                                $(".top11 > .facebookBlock").closest('.tab').find('.remove_div').html("");
                            }
                            $('.top11').css('background-image', 'url('+result[1]+')')
                            console.log(polls_is_candidate_last,polls_data_last)
                            $('.top11').find('.facebook').click(() => shareOverrideOGMeta(window.location.href,'Polls',polls_is_candidate_first,result[1] ))
                        }
                    });
                    break;
                case "top10":
                    $.ajax({
                        url: "/polls_answer",
                        data: {type: 'first' , condidate: polls_is_candidate_last, polls_id: polls_data_last, _token: $('input[name="_token"]').val(), name : user, 'useruuid': useruuid, 'type': 'hot10'  },
                        method:'post',
                        success: function(result){
                            if(result[0] == 'yes_or_no'){
                                $(".top10 > .facebookBlock").html(voting_text_error);
                                $(".top10 > .facebookBlock").closest('.tab').find('.remove_div').html("");
                            } else {
                                $(".top10 > .facebookBlock").html(voting_text);
                                $(".top10 > .facebookBlock").closest('.tab').find('.remove_div').html("");
                            }
                            $('.top10').css('background-image', 'url('+result[1]+')')
                            $('.top10').find('.facebook').click(() => shareOverrideOGMeta(window.location.href,'Polls',polls_is_candidate_first,result[1] ))
                        }
                    });
                    break;
                case "text_answer":
                        $.ajax({
                            url: "/text_answer",
                            data: {question: answer.id, answer: answer.text, _token: $('input[name="_token"]').val(), name : user, 'useruuid': useruuid},
                            method:'post',
                            success: function(result){
                                savebtn.closest(".remove_div").html(voting_text);
                                if(result[0] == 'yes_or_no'){
                                    $(".text_answer > .facebookBlock").html(voting_text_error);
                                    $(".text_answer > .facebookBlock").closest('.zoom').find('.remove_div').html("");
                                } else {
                                    $(".text_answer > .facebookBlock").html(voting_text);
                                    $(".text_answer > .facebookBlock").closest('.zoom').find('.remove_div').html("");
                                }
                                $('.text_answer').css('background-image', 'url('+result[1]+')')
                                $('.text_answer').find('.facebook').click(() => shareOverrideOGMeta(window.location.href, question_text, answer.text, result[1]))
                            }
                        });
                    break;

            }
        });
      }


