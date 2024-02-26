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
// $(document).ready(function(){
//   $('.toggle').click(function(){
//     $('.sidebar-contact').toggleClass('active2')
//     $('.toggle').toggleClass('active2')
//   })
// })






function showLoadingIcon() {
  $('.loading-icon').show();
}

function hideLoadingIcon() {
  $('.loading-icon').hide();
}

// $('#accountNumber').on('input', function() {
//   const inputAccountNumber = $(this).val();
  
//   showLoadingIcon();
  
//   setTimeout(function() {
//     hideLoadingIcon();
 
//   }, 1000); 
// });
$('.payment-option').on('click', function() {

  $('.payment-option').removeClass('selected');
  

  $(this).addClass('selected');
  

  const selectedPaymentMethod = $(this).data('value');
  

  switch(selectedPaymentMethod) {
      case 'e-wallet':
          break;
      case 'credit-card':
          break;
      case 'qr-ph':
          break;
      default:
          break;
  }
});

