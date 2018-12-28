$(document).ready(function() {

  "use strict";

  // -------------- Preloader -------------- 
  $(".preloader").addClass('animated fadeOut');
  setTimeout(function(){
    $(".preloader").addClass('loaded');
  }, 2500);

  // -------------- Wow -------------- 

  var wow = new WOW(
  {
    animateClass: 'animated',
    offset: 100,
    mobile: false
  }
  );
  wow.init();

  // -------------- Product Showcase -------------- 

  $('.sp-wrap').smoothproducts();
  
  // -------------- CountTo -------------- 

  $('.counter-number').countTo();

  
  // -------------- Jquery Isotope Setting -------------- 

  var $container1 = $('.job-content-1'),
      $container2 = $('.job-content-2');
  $container1.isotope({
    filter: '*',
    layoutMode: 'vertical',
    vertical: {
      horizontalAlignment: 0.5
    }
  });

  $container2.isotope({
    filter: '*',
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });

  $('.job-filter-1 a').on('click', function(e) {
    e.preventDefault();
    $('.job-filter-1 .current').removeClass('current');
    $(this).addClass('current');

    var selector = $(this).attr('data-filter');
    $container1.isotope({
      filter: selector,
      layoutMode: 'vertical',
    });
    return false;
  });

  $('.job-filter-2 a').on('click', function(e) {
    e.preventDefault();
    $('.job-filter-2 .current').removeClass('current');
    $(this).addClass('current');

    var selector = $(this).attr('data-filter');
    $container2.isotope({
      filter: selector,
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
    return false;
  });



  // -------------- Slick -------------- 

  $('.client-logos').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false, 
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });

  $('.testimonial-3-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // -------------- Dropdown -------------- 

  $(".dropdown").hover(
    function() { $('.dropdown-menu', this).fadeIn("fast");
    },
    function() { $('.dropdown-menu', this).fadeOut("fast");
  });
    

  // -------------- Parallax -------------- 

  var window_width = $(window).width();
  
  if( window_width > 992 ){
    $('.testimonial-1').parallax("50%", 0.1);
    $('.testimonial-2').parallax("50%", 0.1);
    $('.testimonial-3').parallax("50%", 0.1);
    $('.got-a-question').parallax("50%", 0.1);
    $('.job-counter').parallax("50%", 0.1);
    $('.banner-3').parallax("50%", 0.1);
    $('.banner-2-cols').parallax("50%", 0.1);
    $('.pricing-overlay').parallax("50%", 0.1);
    $('.item').parallax("50%", 0.1);
  
  }

  // -------------- Jquery CountTo (Project Counter) -------------- 
  $('.job-counter').appear(function() {
    $('.counter-number').each(count);
    function count(options) {
      var $this = $(this);
      options = $.extend({}, options || {}, $this.data('countToOptions') || {});
      $this.countTo(options);
    }
  });

  // -------------- On Scroll Navbar Effect -------------- 

  var window_width = $(window).width();

  $(window).scroll(function(){  
    "use strict"; 
    var scroll = $(window).scrollTop();
    if( scroll > 60 ){
      $(".navbar").addClass("scroll-fixed-navbar");
    } else {
      $(".navbar").removeClass("scroll-fixed-navbar");
    }
  });


});
function load_file(event,pic) {
  var img=document.getElementById(pic);
  img.src=URL.createObjectURL(event.target.files[0]);
}
function fun(sender,reciever,s_id,r_id,str){
  if(str==""){
    return;
  }
  var data="sender="+sender+"&reciever="+reciever+"&s_id="+s_id+"&r_id="+r_id+"&msg="+str;
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("POST","mess_receive.php?"+data,true);
  xmlhttp.send();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      $('#mess').val('');
      chat_box();
    }
  }   
}
function chat_box(){
  var s_id=$('#s_id').val();
  var r_id=$('#r_id').val();
  var type=$('#type').val();
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("POST","chat_box.php?s_id="+s_id+"&r_id="+r_id+"&type="+type,true);
  xmlhttp.send();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      $('#messages').html(xmlhttp.responseText);
      var elem = document.getElementById('messages');
      elem.scrollTop = elem.scrollHeight;
    }
  }   
}