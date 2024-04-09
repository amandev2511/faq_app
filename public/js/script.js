
$(".dropbtn").click(function() {
  $(this).toggle();
});

$(document).ready(function() {
  $('.anchor').click(function() {
      $(this).parents('.dropdown-check-list').toggleClass('visible');
  })
})

$("#Arrow_close").click(function() {
  $(".side_bar").toggleClass("side_nav_bar");
});

$(".first_setting").click(function() {
  $(".parent_ul").toggle();
  $(this).toggleClass("active");
});

$(".first_listing").click(function() {
  $(".list_ul").toggle();
  $(this).toggleClass("active");
});

$("#Arrow_close").click(function() {
  $(".container-fluid").toggleClass("Main_width");
});

$(".title_header").click(function() {
  $(".side_bar").show();
});

$("#close_side_bar").click(function() {
  $(".side_bar").hide();
});























