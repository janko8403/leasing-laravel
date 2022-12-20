require('./jquery.min');
require('./jquery.validate.min');
require('./bootstrap');
require('./jquery-ui.min');

import dataPickerLng from './modules/datapicker';
import dataPickerStart from './modules/data';
import galleryFilter from './modules/gallery-filter';
import countCalc from './modules/count-value';

class App {
    constructor () {
        this.events();

        // dataPickerStart();
        // dataPickerLng();
        // galleryFilter();
        // countCalc();
    }


    events() {

        jQuery.browser = {};
        (function () {
        jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();

        $('.check-btn').on('click', function() {
            setTimeout(function() {
                $('html,body').animate({
                    scrollTop: $('#submit').offset().top - 150
                }, 3000);
            }, 500)
        })

        $(document).ready(function() {
            var stickyNavTop = $('.navbar').offset().top;

            var stickyNav = function(){
                var scrollTop = $(window).scrollTop(); 
                if (scrollTop > 0 ) { 
                    $('.navbar').addClass('sticky');
                } else {
                    $('.navbar').removeClass('sticky'); 
                }
            };
            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });
        });

        // $('a[href^="#"]').on('click', function(event) {
        //     var target = $(this.getAttribute('href'));
        //     if( target.length ) {
        //         event.preventDefault();
        //         $('html, body').stop().animate({
        //             scrollTop: target.offset().top
        //         }, 1000);
        //     }
        // });

        $("#button").click(function() {
            $('html, body').animate({
                scrollTop: $("#elementtoScrollToID").offset().top
            }, 2000);
        });

        function sendMail() {
            var contactForm = $('#contact-form');

            contactForm.validate({
                rules: {
                    name: "required",
                    checkbox: "required",
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    name: "Uzypełnij to pole",
                    email: "Uzypełnij to pole"
                },
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            contactForm.on('submit', function(e) {
                e.preventDefault();

                console.log('ij');

                if (contactForm.find('.error:visible').length) {
                    setTimeout(function() { 
                        $('html, body').stop().animate({
                            scrollTop: $('#section-form').offset().top
                        }, 1250);
                    }, 300);
                }

                if (!contactForm.find('.error:visible').length) {
                    $.ajax({
                        url: '/send-form',
                        type: 'POST',
                        data: contactForm.serialize(),
                        success: function(response) {
                            if(response) {
                                showMsg('Dziękujemy za wysłanie wiadomości!');
                            }
                        },
                        error: function() {
                            showMsg('Błąd wysyłania wiadomości!');
                        }
                    });
                }
            });

            function showMsg(message) {
                setTimeout(function () {

                    setTimeout(function () {
                        $('.send-alert').delay(500).fadeIn(500);
                        $('.send-alert').html(message);
                        $('input, textarea, checkbox').val('');
                    }, 500);

                    setTimeout(function () {
                            $('.send-alert').delay(2000).fadeOut(1000);
                    }, 2000);

                }, 500);
            }
        }
        sendMail();


        $(document).ready(function() {
            var $chatbox = $('.chatbox'),
                $chatboxTitle = $('.chatbox__title'),
                $chatboxTitleClose = $('.chatbox__title__close'),
                $chatboxCredentials = $('.chatbox__credentials');

            $chatboxTitle.on('click', function() {
                console.log('hhhh');
                $chatbox.toggleClass('chatbox--tray');
            });

            $chatboxTitleClose.on('click', function(e) {
                e.stopPropagation();
                $chatbox.addClass('chatbox--closed');
            });
            
            $chatbox.on('transitionend', function() {
                if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
            });
            
        });

        function sendChat() {
            var sendForm = $('#send-chat');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".btn-submit-chat").click(function(e){
                e.preventDefault();

                $.ajax({
                    url: 'user/send-chat',
                    type: 'POST',
                    data: sendForm.serialize(),
                    success: function(response) {
                        console.log('send');
                         $('.chat_set_height').val('');
                    },
                    error: function() {
                        console.log('err');
                        // showMsg('Błąd wysyłania wiadomości!');
                    }
                });
            
            });

            function showMsg(message) {
                setTimeout(function () {

                    setTimeout(function () {
                        $('.send-alert').delay(500).fadeIn(500);
                        $('.send-alert').html(message);
                        $('input, textarea, checkbox').val('');
                    }, 500);

                    setTimeout(function () {
                            $('.send-alert').delay(2000).fadeOut(1000);
                    }, 2000);

                }, 500);
            }
        }
        sendChat();

    }
}

document.addEventListener('DOMContentLoaded', () => {
    new App(); 
});

