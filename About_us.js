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
// typeWriter Text
var message1 =
  "là một trong những doanh nghiệp uy tín nhất với kinh nghiệm tổ chức nhiều sự kiện âm nhạc. Được thành lập dựa trên mong muốn đem đến cho khách hàng những trải nghiệm âm nhạc tốt nhất.Quyền lợi của khách hàng luôn được chúng tôi ưu tiên hàng đầu trong mọi trường hợp. Sự tin tưởng của các bạn là động lực lớn nhất để chúng tôi không ngừng xây dựng và khắc phục những thiếu sót. Không lời cảm ơn nào là đủ để diễn tả sự trân trọng dành cho niềm tin mà các bạn đặt vào chúng tôi.";
var speed1 = 40;
var i1 = 0;
function typeWriter1() {
  if (i1 < message1.length) {
    document.getElementById("p1").innerHTML += message1.charAt(i1);
    i1++;
    setTimeout(typeWriter1, speed1);
  }
}
typeWriter1();
