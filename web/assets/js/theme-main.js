

//main.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is JS file that contains principal fuctions of theme */
// -------------------------------------------------------------------------------------------------------------------------------
// Template Name: Sports Cup- Responsive HTML5  soccer and sports Template.
// Author: Iwthemes.
// Name File: main.js
// Version 1.0 - Created on 20 May 2014
// Last Update 3.0 -  on 20 Oct 2017
// Website: http://www.iwthemes.com
// Email: support@iwthemes.com
// Copyright: (C) 2017

$(document).ready(function($) {

	'use strict';


    //=========== Sticky nav ===========//
    $(".mainmenu").sticky({topSpacing:0});

    //======== Nav Superfish ===========//
    $('ul.sf-menu').superfish();

    $(document).ready(function(){
        $('#mobile-nav').mmenu();
    });

    //======== Single Carousel ===========//
    $(".single-carousel").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
    });

    //======== Hero Slider ===========//
    $("#hero-slider").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        mobileFirst: true,
        autoplaySpeed: 4000,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    //======== Single Carousel ===========//
    $("#events-carousel").slick({
        lazyLoad: 'progressive',
        arrows: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });


    //======== Sponsors Carousel ===========//
    $(".sponsors-carousel").slick({
        lazyLoad: 'progressive',
        arrows: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        mobileFirst: true,
        autoplaySpeed: 3000,
        autoplay: true,
        speed: 500,
    });

    //=================================== Counter  ==============================//

    $('#event-one').countdown('2018/06/14', function(event) {
      var $this = $(this).html(event.strftime(''
      + '<span>%D <br> <small>days</small></span>  '
      + '<span>%H <br> <small>hr</small> </span>  '
      + '<span>%M <br> <small>min</small> </span>  '
      + '<span>%S <br> <small>sec</small></span> '));
    });


     //=================================== Subtmit Form  ===================================//

       $('.form-theme').submit(function(event) {
             event.preventDefault();
             var url = $(this).attr('action');
             var datos = $(this).serialize();
                $.get(url, datos, function(resultado) {
                $('.result').html(resultado);
            });
        });

      //=================================== Form Newslleter  =================================//

      $('#newsletterForm').submit(function(event) {
           event.preventDefault();
           var url = $(this).attr('action');
           var datos = $(this).serialize();
            $.get(url, datos, function(resultado) {
            $('#result-newsletter').html(resultado);
        });
      });


    $(document).ready(function(){
        /*var feed = new Instafeed({
            get: 'user',
            userId: '',
            limit: 6,
            resolution: 'standard_resolution',
            template: '<div class="insta-items"><a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a></div>',
            accessToken: '',
        });

        feed.run();*/
    });



    //=================================== Portfolio Filters  ==============================//

      $(window).load(function(){
          var $container = $('.portfolioContainer');
          $container.isotope({
          filter: '*',
              animationOptions: {
              duration: 750,
              easing: 'linear',
              queue: false
        }
      });

      $('.portfolioFilter a').click(function(){
          $('.portfolioFilter .current').removeClass('current');
          $(this).addClass('current');
           var selector = $(this).attr('data-filter');
           $container.isotope({
            filter: selector,
                  animationOptions: {
                  duration: 750,
                  easing: 'linear',
                  queue: false
                }
            });
           return false;
          });
       });


       $('[data-toggle="popover"]').popover();

      //=================================== Totop  ============================================//

       $().UItoTop({
            scrollSpeed:500,
            easingType:'linear'
        });

});
