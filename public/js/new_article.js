$(document).ready(function () {
    $("#status").click(function () {
        $(".text").fadeOut(function () {
            $(".text").text(($(".text").text() == 'Article à publier') ? 'Article à sauvegarder' : 'Article à publier').fadeIn();
        })
    })
    $('#lfm').filemanager('image', {prefix: "/filemanager"});
});