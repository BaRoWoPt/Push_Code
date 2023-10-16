//contructor funciton
function validator(options) {
  var formElement = document.querySelector(options.form);
  if (formElement) {
    console.log(formElement);
  }
}
// Rules
validator.isRequired = function () {};
validator.isEmail = function () {};
