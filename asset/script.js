// Lay button
let button = document.getElementById("topbTN");

//Khi ng dung keo trang xuong 20 px thi hien nut TOP
window.onscroll = function () {
  scrollFunction();
};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    button.style.display = "block";
  } else {
    button.style.display = "none";
  }
}

//Khi ng dung click button thi keo len trang dau
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
