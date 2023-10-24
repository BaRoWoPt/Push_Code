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
var message1 ="là một trong những doanh nghiệp uy tín nhất với kinh nghiệm tổ chức nhiều sự kiện âm nhạc.";
        var speed1 = 50;
        var i1 = 0;
        function typeWriter1(){
            document.getElementById("p1").innerHTML += message1.charAt(i1);
            i1++;
            setTimeout(typeWriter1, speed1);
        }
        typeWriter1();
var message2 ="Được thành lập dựa trên mong muốn đem đến cho khách hàng những trải nghiệm âm nhạc tốt nhất.";
        var speed2 = 60;
        var i2 = 0;
        function typeWriter2(){
            document.getElementById("p2").innerHTML += message2.charAt(i2);
            i2++;
            setTimeout(typeWriter2, speed2);
        }
        typeWriter2();
var message3 ="Quyền lợi của khách hàng luôn được chúng tôi ưu tiên hàng đầu trong mọi trường hợp.";
        var speed3 = 70;
        var i3 = 0;
        function typeWriter3(){
            document.getElementById("p3").innerHTML += message3.charAt(i3);
            i3++
            setTimeout(typeWriter3, speed3);
        }
        typeWriter3();
var message4 ="Sự tin tưởng của các bạn là động lực lớn nhất để chúng tôi không ngừng xây dựng và khắc phục những thiếu sót.";
        var speed4 = 80;
        var i4 = 0;
        function typeWriter4(){
            document.getElementById("p4").innerHTML += message4.charAt(i4);
            i4++
            setTimeout(typeWriter4, speed4);
        }
        typeWriter4();
var message5 ="Không lời cảm ơn nào là đủ để diễn tả sự trân trọng dành cho niềm tin mà các bạn đặt vào chúng tôi.";
        var speed5 = 90;
        var i5 = 0;
        function typeWriter5(){
            document.getElementById("p5").innerHTML += message5.charAt(i5);
            i5++
            setTimeout(typeWriter5, speed5);
        }
        typeWriter5();
