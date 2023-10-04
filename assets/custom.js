
    function customAlert(info){
$("body").append(`<div class="custom-alert-container"><div class="custom-alert slide-top"> <span>`+info+`</span> </div></div>`);

    // Automatically remove the alert after 2 seconds
    setTimeout(function () {
        $(".custom-alert").remove();
    }, 3000); // 3000 milliseconds (3 seconds)
}
$(".sidebar-left-action-btn").click(function (e) { 
    e.preventDefault();
    $(this).prev().toggleClass("open");
    $(this).toggleClass("open").find("i").toggleClass("fa-arrow-right fa-arrow-left");
    
});


