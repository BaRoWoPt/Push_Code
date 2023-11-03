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
function themvaogiohang(event){
	event.preventDefault();
	var form = document.getElementById("form_1");
	var name = document.getElementById("fullname").value;
	var phoneNumber = document.getElementById("thongtin").value;
	var email = document.getElementById("gmail").value;
	var ticketQuantity = document.getElementById("buy_ticket").value;
	var khInput = new Array(name,phoneNumber,email,ticketQuantity);
	if (name === "" || phoneNumber === "" || email === "" || ticketQuantity === "")
	{
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
	if (thongtinKH[i][0] === name && thongtinKH[i][1] === phoneNumber && thongtinKH[i][2] === email) {
	foundIndex = i;
	 break;
	}
    }
	if (foundIndex !== -1) {
	// Nếu thông tin khách hàng đã tồn tại, cộng số lượng đặt hàng mới với số lượng đặt hàng trước đó
	var previousQuantity = parseInt(thongtinKH[foundIndex][3], 10);
	var newQuantity = parseInt(ticketQuantity, 10);
	thongtinKH[foundIndex][3] = previousQuantity + newQuantity;
    } else {
	// Nếu thông tin khách hàng chưa tồn tại, thêm thông tin mới vào mảng
	thongtinKH.push(khInput);
	 }
	sessionStorage.setItem("thongtinKH",JSON.stringify(thongtinKH));
	console.log(thongtinKH);
	form.reset();
	window.scrollTo(0,0);
	alert("Vui lòng kiểm tra trong giỏ hàng để xác nhận thông tin nhé");
	return true;
}
function showgiohang(){
   var gh = sessionStorage.getItem("thongtinKH");
	var giohang = JSON.parse(gh);
	var cartBody = document.getElementById("cart-body");
	 var totalPriceCell = document.getElementById("total-price");
	var totalPrice = 0;

	giohang.forEach(function(item,index) {
	var row = document.createElement("tr");

	var nameCell = document.createElement("td");
	nameCell.textContent = item[0];
	row.appendChild(nameCell);

	var phoneCell = document.createElement("td");
	phoneCell.textContent = item[1];
	row.appendChild(phoneCell);

    var emailCell = document.createElement("td");
	emailCell.textContent = item[2];	
	row.appendChild(emailCell); 

	var quantityCell = document.createElement("td");
	quantityCell.textContent = item[3];
	row.appendChild(quantityCell);

	var priceCell = document.createElement("td");
	var price = calculatePrice(item[3]); 
	priceCell.textContent = price;
	row.appendChild(priceCell);

	var deleteCell = document.createElement("td");
	var deleteButton = document.createElement("button");
	deleteButton.classList.add("delete-cell")
	deleteButton.textContent = "Xóa";
	deleteButton.addEventListener("click", function() {
   deleteCartItem(index);		
 });
	deleteCell.appendChild(deleteButton);
	row.appendChild(deleteCell);

	cartBody.appendChild(row);

	totalPrice += price; 

});
	totalPriceCell.textContent = totalPrice;
	function calculatePrice(quantity) {		
	var pricePerTicket = 1000000;
	return quantity * pricePerTicket;
}	
	function deleteCartItem(index) {
	giohang.splice(index, 1);
	sessionStorage.setItem("thongtinKH", JSON.stringify(giohang));
	location.reload(); 
  }					
}
    function deleteAll(){
    sessionStorage.removeItem("thongtinKH");
    location.reload();
}
  showgiohang(); 