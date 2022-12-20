/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// var buttonId = '#cookie-understand';
// var cookieName = 'lecookie';
// var cookieValue = 'le-cookie1';
// var cookieExpire = 10;

// $(document).ready(function () {
//   $(buttonId).click(function () {
//     if ($.cookie(cookieName) == null) {

     
//       $.cookie(cookieName, cookieValue, { expires: cookieExpire, path: '/' });

     
//       $('.cookie-bar').removeClass('cookie-bar--active');
//     }
//   });

//   checkCookie();

// });

// function checkCookie() {
//   if ($.cookie(cookieName) == null) {
//     $('.cookie-bar').addClass('cookie-bar--active');
//   }
// }

var address = $('.address');
var branch = $('.branch');


$('.chb').on('change', function() {
    $(".chb").prop('checked',false);
    $(this).prop('checked',true);
});

$('#cb1').on('click', function() {
    if($(this).prop('checked',true)) {
        address.css('display', 'none');
        branch.css('display', 'block');
    }
});


$('#cb2').on('click', function() {
    if($(this).prop('checked',true)) {
        branch.css('display', 'none');
        address.css('display', 'block');
    }
});

