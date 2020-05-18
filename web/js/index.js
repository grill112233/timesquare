$(document).ready(function(){
	
    $('.notification').click(function(){
        if(!$(document).find('.notification-dropdown').hasClass('dd')){
            hide_dropdown_notification()
        }else{
            $('.notification-dropdown').removeClass('dd').addClass('dropdown-transition')
        }
    })

    $(document).on('click',function(e){
        var target = $(e.target)
        if(!target.closest('.notification').length && !target.closest('.dropdown-transition').length){
            if(!$(document).find('.notification-dropdown').hasClass('dd')){
                hide_dropdown_notification()
            }
        }
    })

    function hide_dropdown_notification(){
        $(document).find('.notification-dropdown').removeClass('dropdown-transition').addClass('dd')
        $(document).find('.notification-dropdown').find('.list-item').addClass('background-white')
    }

    $('.profile').click(function(){
        if(!$(document).find('.profile-dropdown').hasClass('dd')){
            hide_dropdown_profile()
        }else{
            $('.profile-dropdown').removeClass('dd').addClass('profile-transition')
        }
    })
	
    $(document).on('click',function(e){
        var target = $(e.target)
        if(!target.closest('.profile').length && !target.closest('.profile-transition').length){
            if(!$(document).find('.profile-dropdown').hasClass('dd')){
                hide_dropdown_profile()
            }
        }
    })
	
    function hide_dropdown_profile(){
        $(document).find('.profile-dropdown').removeClass('profile-transition').addClass('dd')
        $(document).find('.profile-dropdown').find('.list-item').addClass('background-white')
    }
	
	
    $('.inbox').click(function(){
        if(!$(document).find('.inbox-dropdown').hasClass('dd')){
            hide_dropdown_inbox()
        }else{
            $('.inbox-dropdown').removeClass('dd').addClass('inbox-transition')
        }
    })
	
    $(document).on('click',function(e){
        var target = $(e.target)
        if(!target.closest('.inbox').length && !target.closest('.inbox-transition').length){
            if(!$(document).find('.inbox-dropdown').hasClass('dd')){
                hide_dropdown_inbox()
            }
        }
    })
	
    function hide_dropdown_inbox(){
        $(document).find('.inbox-dropdown').removeClass('inbox-transition').addClass('dd')
        $(document).find('.inbox-dropdown').find('.list-item').addClass('background-white')
    }

})