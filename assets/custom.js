
    function customAlert(info){
$("body").append(`<div class="custom-alert slide-top"> <span>`+info+`</span> </div>`);

    // Automatically remove the alert after 2 seconds
    setTimeout(function () {
        $(".custom-alert").remove();
    }, 3000); // 3000 milliseconds (3 seconds)
}



