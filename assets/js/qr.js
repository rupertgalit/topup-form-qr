$(document).ready(function(){
  if ($(window).width() > 768) {
    $('.sidebar-contact, .toggle').addClass('active2');
  }

  $('.toggle').click(function(){
    $('.sidebar-contact').toggleClass('active2');
    $('.toggle').toggleClass('active2');
  });

  $(window).resize(function(){
    if ($(window).width() > 768) {
      $('.sidebar-contact, .toggle').addClass('active2');
    } else {
      $('.sidebar-contact, .toggle').removeClass('active2');
    }
  });
});