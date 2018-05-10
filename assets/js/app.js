$(document).ready(()=>{
    $(".notification>.delete").click(function(e) {
        $(this).parent(".notification").fadeOut();
    });

    $("[data-trigger='close-modal']").click(function(x){
        $(this).parents(".modal").removeClass("is-active");
    });
});