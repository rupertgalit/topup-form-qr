$(document).ready(function() {
  $('#contact_form').bootstrapValidator({
      // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          first_name: {
              validators: {
                  stringLength: {
                      min: 2,
                  },
                  notEmpty: {
                      message: 'Please supply your first name'
                  }
              }
          },
          last_name: {
              validators: {
                  stringLength: {
                      min: 2,
                  },
                  notEmpty: {
                      message: 'Please supply your last name'
                  }
              }
          },
          email: {
              validators: {
                  notEmpty: {
                      message: 'Please supply your email address'
                  },
                  emailAddress: {
                      message: 'Please supply a valid email address'
                  }
              }
          },
          phone: {
             validators: {
                  notEmpty: {
                       message: 'Please supply your phone number'
                 },
                 regexp: {
                   regexp: /^(0)?[0-9]{10}$/,
                 message: 'Please enter a valid 10-digit phone number'
                }
            }
        },
    address: {
              validators: {
                  stringLength: {
                      min: 8,
                  },
                  notEmpty: {
                      message: 'Please supply your street address'
                  }
              }
          },
          city: {
              validators: {
                  stringLength: {
                      min: 4,
                  },
                  notEmpty: {
                      message: 'Please supply your city'
                  }
              }
          },
          province: {
              validators: {
                  stringLength: {
                      min: 4,
                  },
                  notEmpty: {
                      message: 'Please supply your province'
                  }
              }
          },
          zip: {
              validators: {
                  notEmpty: {
                      message: 'Please supply your zip code'
                  }
              }
          },
          message: {
              validators: {
                  stringLength: {
                      min: 10,
                      max: 200,
                      message:'Please enter at least 10 characters and no more than 200'
                  },
                  notEmpty: {
                      message: 'Please enter a message'
                  }
              }
          }
      }
  })
  .on('success.form.bv', function(e) {
      $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
      $('#contact_form').data('bootstrapValidator').resetForm();

      // Prevent form submission
      e.preventDefault();

      // Get the form instance
      var $form = $(e.target);

      // Get the BootstrapValidator instance
      var bv = $form.data('bootstrapValidator');

      // Use Ajax to submit form data
      $.post($form.attr('action'), $form.serialize(), function(result) {
          console.log(result);
      }, 'json');
  });
});
document.getElementById("phone").addEventListener("keydown", function(event) {
  // Allow only backspace, delete, tab, and numeric inputs
  if (event.key === "Backspace" || event.key === "Delete" || event.key === "Tab" ||
      event.key === "ArrowLeft" || event.key === "ArrowRight" || event.key === "ArrowUp" ||
      event.key === "ArrowDown" || event.key === "Home" || event.key === "End" ||
      (event.key >= "0" && event.key <= "9")) {
      // Allow the event to continue
  } else {
      // Prevent the default action (typing)
      event.preventDefault();
  }
});