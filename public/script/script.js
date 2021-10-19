$(document).ready(function () {
  new Typed(".typing", {
    strings: ["CAT FULL BODY", "BODY REPAIR", "POLES", "DETAILING", "COATING"],
    typedSpeed: 100,
    backSpeed: 60,
    loop: true,
  });
});

// when in the scroll, appears icon scroll to top
$(window).scroll(function () {
  var totalHeight = $(window).scrollTop();
  if (totalHeight > 300) {
    $(".scroll-up").fadeIn();
  } else {
    $(".scroll-up").fadeOut();
  }
});
//process scroll
$(".scroll-up").on("click", function (event) {
  $([document.documentElement, document.body]).animate(
    {
      scrollTop: $("#home").offset().top,
    },
    100,
    "easeInOutExpo"
  );
});
/* scroll event */
// $(".page-scroll").on("click", function (e) {
//   // get href
//   var tujuan = $(this).attr("href");
//   // add elemnt
//   var elemenTujuan = $(tujuan);

//   $("html, body").animate(
//     {
//       scrollTop: elemenTujuan.offset().top - 50,
//     },
//     1500,
//     "easeInOutExpo"
//   );
//   e.preventDefault();
// });
