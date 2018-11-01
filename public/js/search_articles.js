function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("articles-list");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h3")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function search_as_guest() {
    var input, filter, list, el, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    list = document.getElementById("articles-list");
    el = list.getElementsByClassName("col-md-3");
    for (i = 0; i < el.length; i++) {
        a = el[i].getElementsByTagName("h1")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            el[i].style.display = "";
        } else {
            el[i].style.display = "none";
        }
    }
}