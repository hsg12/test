$(function(){

    var pathname = window.location.pathname;
    $('.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');

    $('.confirm-plugin').jConfirmAction({
        question: 'Are you sure?',
        noText: 'Cancel'
    });

});