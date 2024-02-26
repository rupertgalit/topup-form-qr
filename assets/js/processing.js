$(document).ready(function(){
  if ($(window).width() > 768) {
    $('.sidebar-contact, .toggle').addClass('active');
  }

  $('.toggle').click(function(){
    $('.sidebar-contact').toggleClass('active');
    $('.toggle').toggleClass('active');
  });

  $(window).resize(function(){
    if ($(window).width() > 768) {
      $('.sidebar-contact, .toggle').addClass('active');
    } else {
      $('.sidebar-contact, .toggle').removeClass('active');
    }
  });
});