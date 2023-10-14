$(document).ready(function () {
    $('.header__burger').click(function(event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
    
    $(".klundesaga-title").click(function (e) {
    var klundesagaitem = $(this).attr("data-tab");
    $("#" + klundesagaitem)
    .slideToggle()
    .parent()
    .siblings()
    .find(".klundesaga-content")
    .slideUp();
  
    $(this).toggleClass("active-title");
    $("#" + klundesagaitem)
    .parent()
    .siblings()
    .find(".klundesaga-title")
    .removeClass("active-title");
  
    $("i.fa-chevron-down", this).toggleClass("chevron-top");
    $("#" + klundesagaitem)
    .parent()
    .siblings()
    .find(".klundesaga-title i.fa-chevron-down")
    .removeClass("chevron-top");
    });
});
