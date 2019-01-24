$(document).on('click','#admin-toolbar',function(){
    $('#admin-panel').slideToggle();
});

$(document).on('click','.profile',function(){
    $('#admin-menu').slideToggle();
    $('.admin-panel').slideToggle();
});