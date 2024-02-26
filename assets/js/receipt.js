function downloadReceiptAsPDF() {
  const receiptContent = document.getElementById('receiptContent');
  const downloadButton = document.querySelector('.comic-button'); 
  const backButton = document.querySelector('.back'); 

  downloadButton.style.display = 'none';
  backButton.style.display = 'none';

  // Wait for animations to complete
  setTimeout(() => {
      const options = {
          filename: 'ISELCO-Receipt.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 4 },
          jsPDF: { 
              unit: 'mm', 
              format: [90, 222],
              orientation: 'portrait',
              putOnlyUsedFonts: true,
              floatPrecision: 16,
          },
          pagebreak: { mode: 'avoid-all' }
      };

      const styles = `
          <style>
              body {
                  display:flex
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
              }
              #receiptContent {
              }
          </style>
      `;
      const contentWithStyles = styles + receiptContent.innerHTML;

      html2pdf()
          .from(contentWithStyles)
          .set(options)
          .save()
          .then(() => {
              downloadButton.style.display = 'inline-block';
              backButton.style.display = 'inline-block';
          })
          .catch(error => {
              console.error('Error generating PDF:', error);
              downloadButton.style.display = 'block';
              backButton.style.display = 'block';
          });
  }, 2000); // Adjust this delay according to the duration of your animations
}

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