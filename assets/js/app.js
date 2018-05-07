$(document).ready(()=>{
    $(".notification>.delete").click(function(e) {
        $(this).parent(".notification").fadeOut();
    });
});