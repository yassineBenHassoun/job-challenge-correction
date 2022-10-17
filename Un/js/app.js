$(document).ready(function () {
    $("a[data-toggle=collapse]").click(function () {
        $(this).find("span:first").toggleClass("glyphicon-menu-down glyphicon-menu-up")
    });
    $(".close-all").click(function () {
        $(this).parent().next(".panel-group").find(".faq").next(".in").collapse("hide");
        $(this).closest(".content").find(".faq").find("span:first").removeClass("dropup").addClass("nothing")
    });
    $(".open-all").click(function () {
        $(this).parent().next(".panel-group").find(".faq").next("div:not('.in')").collapse("show");
        $(this).closest(".content").find(".faq").find("span:first").removeClass("nothing").addClass("dropup")
    });
    $(".faq").click(function () {
        changeCarret($(this));
    });
    $(".clickable").click(function () {
        changeCarret($(this));
    });

});

function changeCarret(that) {
    var elem = that.find(".nothing");
    if (elem.hasClass("dropup")) {
        elem.removeClass("dropup");
    } else {
        elem.addClass("dropup");
    }
}

function myFunctionText(id) {
    if ($("." + id).hasClass("show")) {
        $("." + id).hide();
        $("." + id).removeClass("show");
    } else {
        $("." + id).show();
        $("." + id).addClass("show");
    }
}