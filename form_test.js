// ham
function validator(options) {
  //ham thuc hien validate
  var selectorRules = {};
  function validate(inputElement, rule) {
    var errorMessage = rule.test(inputElement.value);
    var errorElement = inputElement.parentElement.querySelector(
      options.errorSelector
    );
    // var rules = selectorRules[rule.selector];
    if (errorMessage) {
      errorElement.innerText = errorMessage;
      inputElement.parentElement.classList.add("invalid");
    } else errorElement.innerText = " ";
  }
  // lay element cua form can validate
  var formElement = document.querySelector(options.form);
  if (formElement) {
    // var isInvalid=true;
    options.rules.forEach(function (rule) {
      // luu lai cac rules trong moi input
      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }
      selectorRules[rule.selector] = rule.test;
      var inputElement = formElement.querySelector(rule.selector);

      if (inputElement) {
        // xu ly truong hop blur khoi input
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
        // xu ly truong hop khi nguoi dung nhap vao input
        inputElement.oninput = function () {
          var errElement = inputElement.parentElement.querySelector(
            options.errorSelector
          );
          errElement.innerText = " ";
        };
      }
    });
  }
}

//dinh nghia cac rules
// nguyen tac cac rules
// 1 khi co loi tra ra message loi
// 2 khi hop le khong tra ra loi
validator.isRequired = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : "Vui Lòng Nhập Họ Và Tên";
    },
  };
};
validator.isNumberPhone = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      var phone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      if (!phone.test(value)) {
        return "Vui lòng nhập số điện thoại hợp lệ";
      }

      if (value.charAt(0) !== "0") {
        return "Vui lòng nhập số điện thoại hợp lệ";
      }

      return undefined;
    },
  };
};
validator.isEmail = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return regex.test(value) ? undefined : "Vui Lòng Nhập Email Hợp Lệ";
    },
  };
};
validator.isBuyTicket = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value > 0 ? undefined : "Số lượng vé bạn muốn mua phải lớn hơn 0";
    },
  };
};
validator.isUsername = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      var regexUsername =
        /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
      return regexUsername.test(value)
        ? undefined
        : "Vui lòng nhập đúng tên đăng nhập đã được cung cấp";
    },
  };
};
validator.isPassword = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      var regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,20}$/;
      return regexPassword.test(value)
        ? undefined
        : "Vui lòng nhập đúng mật khẩu đã được cung cấp";
    },
  };
};
function togglePassword() {
  var passwordInput = document.getElementById("password");
  var eyeIcon = document.getElementById("eyeIcon");

  // Kiểm tra xem hiện đang là kiểu password hay không
  var isPasswordType = passwordInput.type === "password";

  // Thay đổi kiểu hiển thị
  passwordInput.type = isPasswordType ? "text" : "password";

  // Đảo ngược trạng thái của biểu tượng con mắt
  eyeIcon.className = isPasswordType
    ? "fa-solid fa-eye"
    : "fa-solid fa-eye-slash";
}
