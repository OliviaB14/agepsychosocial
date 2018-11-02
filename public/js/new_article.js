$(document).ready(function () {
    $("#status").click(function () {
        $(".text").fadeOut(function () {
            $(".text").text(($(".text").text() == 'Article à sauvegarder') ? 'Article à publier' : 'Article à sauvegarder').fadeIn();
        })
    })
    $('#lfm').filemanager('image', {prefix: "/filemanager"});
});