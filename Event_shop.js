const closeSideBar = document.getElementById("icon_close_sidebar");
const closeNavBar = document.getElementById("icon_close_navbar");
const sidebar = document.querySelector(".sidebar");
const navsidebar = document.getElementById("navsidebar");
const openSideBar = document.getElementById("icon_open_sidebar");
const openNavSideBar = document.getElementById("icon_chart");

// // process close
function ShowSideBar() {
  sidebar.classList.add("open");
}
openSideBar.addEventListener("click", ShowSideBar);

function ShowNavSideBar() {
  navsidebar.classList.add("open");
}
openNavSideBar.addEventListener("click", ShowNavSideBar);

// //////////////////////////////////////////////////////////////////////////////////////////

function HiddenSideBar() {
  sidebar.classList.remove("open");
}
closeSideBar.addEventListener("click", HiddenSideBar);

function HiddenNavSideBar() {
  navsidebar.classList.remove("open");
}
closeNavBar.addEventListener("click", HiddenNavSideBar);

// //////////////////////////////////////////////////////////////////////////////////////////
const header = document.querySelector(".header");
let lastScrollY = window.scrollY;
window.addEventListener("scroll", () => {
  if (lastScrollY < window.scrollY) {
    header.classList.add("header--hidden");
  } else {
    header.classList.remove("header--hidden");
  }
  lastScrollY = window.scrollY;
});

var thongtinKH = new Array();

function themvaogiohang(event) {
  event.preventDefault();
  var form = document.getElementById("form_1");
  var name = document.getElementById("fullname").value;
  var phoneNumber = document.getElementById("thongtin").value;
  var email = document.getElementById("gmail").value;
  var ticketQuantity = document.getElementById("buy_ticket").value;
  var showNotif = document.getElementsByClassName("sub_type");
  var khInput = new Array(name, phoneNumber, email, ticketQuantity);

  if (
    name === "" ||
    phoneNumber === "" ||
    email === "" ||
    ticketQuantity === ""
  ) {
    alert("Vui lòng nhập đủ thông tin giúp bọn mình nhé!");
    return false;
  }
  function getStoredThongTinKH() {
    var gh = sessionStorage.getItem("thongtinKH");
    return JSON.parse(gh) || [];
  }
  thongtinKH = getStoredThongTinKH();
  var foundIndex = -1;

  for (var i = 0; i < thongtinKH.length; i++) {
    if (
      thongtinKH[i][0] === name &&
      thongtinKH[i][1] === phoneNumber &&
      thongtinKH[i][2] === email
    ) {
      foundIndex = i;
      break;
    }
  }

  if (foundIndex !== -1) {
    var previousQuantity = parseInt(thongtinKH[foundIndex][3], 10);
    var newQuantity = parseInt(ticketQuantity, 10);
    thongtinKH[foundIndex][3] = previousQuantity + newQuantity;
  } else {
    thongtinKH.push(khInput);
  }

  sessionStorage.setItem("thongtinKH", JSON.stringify(thongtinKH));
  window.location.href = "PurchaseConfirm.html";
  return true;
}
function showgiohang() {
  var gh = sessionStorage.getItem("thongtinKH");
  var giohang = JSON.parse(gh);
  var cartBody = document.getElementById("cart-body");
  var totalPriceCell = document.getElementById("total-price");
  var totalPrice = 0;

  giohang.forEach(function (item, index) {
    var row = document.createElement("tr");

    var nameCell = document.createElement("td");
    var nameSpan = document.createElement("span");
    nameSpan.textContent = item[0];
    nameCell.appendChild(nameSpan);
    row.appendChild(nameCell);

    var phoneCell = document.createElement("td");
    var phoneSpan = document.createElement("span");
    phoneSpan.textContent = item[1];
    phoneCell.appendChild(phoneSpan);
    row.appendChild(phoneCell);

    var emailCell = document.createElement("td");
    var emailSpan = document.createElement("span");
    emailSpan.textContent = item[2];
    emailCell.appendChild(emailSpan);
    row.appendChild(emailCell);

    var quantityCell = document.createElement("td");
    var quantitySpan = document.createElement("span");
    quantitySpan.textContent = item[3];
    quantityCell.appendChild(quantitySpan);
    row.appendChild(quantityCell);

    var priceCell = document.createElement("td");
    var priceSpan = document.createElement("span");
    var price = calculatePrice(item[3]);
    priceSpan.textContent = formatCurrency(price);
    priceCell.appendChild(priceSpan);
    row.appendChild(priceCell);

    var deleteCell = document.createElement("td");
    var deleteButton = document.createElement("button");
    deleteButton.classList.add("delete-cell");
    deleteButton.textContent = "Xóa";
    deleteButton.addEventListener("click", function () {
      deleteCartItem(index);
    });
    deleteCell.appendChild(deleteButton);
    row.appendChild(deleteCell);

    var updateCell = document.createElement("td");
    var updateButton = document.createElement("button");
    updateButton.classList.add("update-cell");
    updateButton.textContent = "Cập nhật";
    updateButton.addEventListener("click", function () {
      enableEditMode(row, index);
    });
    updateCell.appendChild(updateButton);
    row.appendChild(updateCell);

    cartBody.appendChild(row);

    totalPrice += price;
  });
  totalPriceCell.textContent = formatCurrency(totalPrice) + " VND";

  function calculatePrice(quantity) {
    var pricePerTicket = 1000000;
    return quantity * pricePerTicket;
  }

  function deleteCartItem(index) {
    giohang.splice(index, 1);
    sessionStorage.setItem("thongtinKH", JSON.stringify(giohang));
    location.reload();
  }

  function enableEditMode(row, index) {
    var cells = row.getElementsByTagName("td");

    var nameCell = cells[0];
    var nameSpan = nameCell.querySelector("span");
    var nameText = nameSpan.textContent;
    var nameInput = document.createElement("input");
    nameInput.classList.add("input_btn");
    nameInput.type = "text";
    nameInput.value = nameText;
    nameCell.replaceChild(nameInput, nameSpan);

    var phoneCell = cells[1];
    var phoneSpan = phoneCell.querySelector("span");
    var phoneText = phoneSpan.textContent;
    var phoneInput = document.createElement("input");
    phoneInput.classList.add("input_btn");
    phoneInput.type = "text";
    phoneInput.value = phoneText;
    phoneCell.replaceChild(phoneInput, phoneSpan);

    var emailCell = cells[2];
    var emailSpan = emailCell.querySelector("span");
    var emailText = emailSpan.textContent;
    var emailInput = document.createElement("input");
    emailInput.classList.add("input_btn");
    emailInput.type = "text";
    emailInput.value = emailText;
    emailCell.replaceChild(emailInput, emailSpan);

    var quantityCell = cells[3];
    var quantitySpan = quantityCell.querySelector("span");
    var quantityText = quantitySpan.textContent;
    var quantityInput = document.createElement("input");
    quantityInput.classList.add("input_btn");
    quantityInput.type = "number";
    quantityInput.value = quantityText;
    quantityInput.addEventListener("input", function () {
      var value = parseInt(quantityInput.value);
      if (!Number.isInteger(value)) {
        quantityInput.value = Math.floor(value);
      }
    });
    quantityCell.replaceChild(quantityInput, quantitySpan);

    var updateButton = cells[6].querySelector("button");
    updateButton.textContent = "Lưu";
    updateButton.removeEventListener("click", function () {
      enableEditMode(row, index);
    });
    updateButton.addEventListener("click", function () {
      saveChanges(row, index);
    });
  }

  function saveChanges(row, index) {
    var giohang = JSON.parse(sessionStorage.getItem("thongtinKH"));

    var cells = row.getElementsByTagName("td");

    var nameCell = cells[0];
    var nameInput = nameCell.querySelector("input");
    var nameText = nameInput.value;
    nameCell.removeChild(nameInput);
    var nameSpan = document.createElement("span");
    nameSpan.textContent = nameText;
    nameCell.appendChild(nameSpan);

    var phoneCell = cells[1];
    var phoneInput = phoneCell.querySelector("input");
    var phoneText = phoneInput.value;
    phoneCell.removeChild(phoneInput);
    var phoneSpan = document.createElement("span");
    phoneSpan.textContent = phoneText;
    phoneCell.appendChild(phoneSpan);

    var emailCell = cells[2];
    var emailInput = emailCell.querySelector("input");
    var emailText = emailInput.value;
    emailCell.removeChild(emailInput);
    var emailSpan = document.createElement("span");
    emailSpan.textContent = emailText;
    emailCell.appendChild(emailSpan);

    var quantityCell = cells[3];
    var quantityInput = quantityCell.querySelector("input");
    var quantityText = quantityInput.value;
    quantityCell.removeChild(quantityInput);
    var quantitySpan = document.createElement("span");
    quantitySpan.textContent = quantityText;
    quantityCell.appendChild(quantitySpan);

    var updateButton = cells[6].querySelector("button");
    updateButton.textContent = "Cập nhật";
    updateButton.removeEventListener("click", function () {
      saveChanges(row, index);
    });
    updateButton.addEventListener("click", function () {
      enableEditMode(row, index);
    });

    giohang[index][0] = nameText;
    giohang[index][1] = phoneText;
    giohang[index][2] = emailText;
    giohang[index][3] = quantityText;

    sessionStorage.setItem("thongtinKH", JSON.stringify(giohang));
    location.reload();
  }
}
function formatCurrency(amount) {
  return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function deleteAll() {
  sessionStorage.removeItem("thongtinKH");
  location.reload();
}
function showNotif() {
  var giohang = JSON.parse(sessionStorage.getItem("thongtinKH"));
  var cartElements = document.getElementsByClassName("nav_type");
  var message = document.createElement("span");
  message.classList.add("sub_type");
  for (var i = 0; i < cartElements.length; i++) {
    var cart = cartElements[i];
    if (giohang && giohang.length > 0) {
      message.textContent = "Có đơn đặt vé cần xác nhận!";
    } else {
      message.textContent = "Giỏ hàng của bạn hiện đang trống";
    }
    cart.appendChild(message);
  }
}
showNotif();
showgiohang();
