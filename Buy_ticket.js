var lastScrollTop = 0;
buyContainer = document.getElementById("buy_container");
window.addEventListener("scroll", function () {
  var scrollTop = document.documentElement.scrollTop;
  if (scrollTop > lastScrollTop) {
    buyContainer.style.top = "-90px";
    buyContainer.style.zIndex = "99";
  } else {
    buyContainer.style.top = "0px";
    buyContainer.style.zIndex = "0";
  }
});
const closeSideBar = document.getElementById("icon_close_sidebar");
const closeNavBar = document.getElementById("icon_close_navbar");
const sidebar = document.querySelector(".sidebar");
const navsidebar = document.getElementById("navsidebar");
const openSideBar = document.getElementById("icon_open_sidebar");
const openNavSideBar = document.getElementById("icon_chart");
const buy_container = document.getElementById("buy_container");

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

buy_container.addEventListener("click", function (event) {
  sidebar.classList.remove("open");
});

function HiddenNavSideBar() {
  navsidebar.classList.remove("open");
}
closeNavBar.addEventListener("click", HiddenNavSideBar);

buy_container.addEventListener("click", function (event) {
  navsidebar.classList.remove("open");
});
// //////////////////////////////////////////////////////////////////////////////////////////
