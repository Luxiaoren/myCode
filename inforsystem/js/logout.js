console.log(1);
$("#bott > i").eq(1).click(function (ev) {
    console.log("out");
    ev.preventDefault();
    window.location.href="index.html";
});
$("#setting > a").html(getCookie("username"));
