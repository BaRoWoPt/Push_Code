const admin = document.querySelector(".main-container");
const closeSideBar = document.getElementById("icon_close_sidebar");
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
// // process close

// //////////////////////////////////////////////////////////////////////////////////////////

admin.addEventListener("click", function (event) {
  sidebar.classList.remove("open");
});

admin.addEventListener("click", function (event) {
  navsidebar.classList.remove("open");
});
// //////////////////////////////////////////////////////////////////////////////////////////
