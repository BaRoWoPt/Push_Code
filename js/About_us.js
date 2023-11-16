// typeWriter Text
var message1 =
  "Eventshop là một trong những doanh nghiệp uy tín nhất với kinh nghiệm tổ chức nhiều sự kiện âm nhạc. Được thành lập dựa trên mong muốn đem đến cho khách hàng những trải nghiệm âm nhạc tốt nhất. Quyền lợi của khách hàng luôn được chúng tôi ưu tiên hàng đầu trong mọi trường hợp. Sự tin tưởng của các bạn là động lực lớn nhất để chúng tôi không ngừng xây dựng và khắc phục những thiếu sót. Không lời cảm ơn nào là đủ để diễn tả sự trân trọng dành cho niềm tin mà các bạn đặt vào chúng tôi.";
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
const About_container = document.querySelector(".container_about");

// // process close

// //////////////////////////////////////////////////////////////////////////////////////////

About_container.addEventListener("click", function (event) {
  sidebar.classList.remove("open");
});

About_container.addEventListener("click", function (event) {
  navsidebar.classList.remove("open");
});
// //////////////////
