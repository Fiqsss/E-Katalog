const btn = $(".tombol");
var logo = $("#cls");
var side = $("#sidebar");

$(document).ready(function () {
    let query = window.matchMedia("(max-width: 1177px)");
    function toggleSidebar() {
        if (logo.hasClass("fa-toggle-off")) {
            logo.toggleClass("fa-toggle-off fa-toggle-on");
            side.css("margin-left", "0px");
        } else if (logo.hasClass("fa-toggle-on")) {
            logo.toggleClass("fa-toggle-on fa-toggle-off");
            side.css("margin-left", "-240px");
        }
    }

    if (query.matches) {
        side.css("margin-left", "-240px");
        logo.toggleClass("fa-toggle-off");
        logo.css("transition", "0.3s ease");
        btn.click(toggleSidebar);
    } else {
        logo.toggleClass("fa-toggle-on");
        side.css("margin-left", "0px");
        logo.css("transition", "0.3s ease");
        btn.click(toggleSidebar);
    }
});

// const btn = $(".tombol");
// var logo = $("#cls");
// var side = $("sidebar");

// $(document).ready(function () {
//   let query = window.matchMedia("(max-width:601px)");
//   if (query.matches) {
//     side.css("margin-left", "-240px");
//     logo.toggleClass("fa-toggle-off");
//     logo.css("transition", "0.3s ease");
//     btn.click(function () {
//       if (logo.hasClass("fa-toggle-off")) {
//         logo.toggleClass("fa-toggle-off");
//         logo.toggleClass("fa-toggle-on");
//         side.css("margin-left", "0px");
//       } else if (logo.hasClass("fa-toggle-on")) {
//         logo.toggleClass("fa-toggle-on");
//         logo.toggleClass("fa-toggle-off");
//         side.css("margin-left", "-240px");
//       }
//     });
//   } else {
//     logo.toggleClass("fa-toggle-on");
//     side.css("margin-left", "0px");
//     logo.css("transition", "0.3s ease");
//     btn.click(function () {
//       if (logo.hasClass("fa-toggle-off")) {
//         logo.toggleClass("fa-toggle-off");
//         logo.toggleClass("fa-toggle-on");
//         side.css("margin-left", "0px");
//       } else if (logo.hasClass("fa-toggle-on")) {
//         logo.toggleClass("fa-toggle-on");
//         logo.toggleClass("fa-toggle-off");
//         side.css("margin-left", "-240px");
//       }
//     });
//   }
// });

// btn.addEventListener("click", function () {
//   var side = $("sidebar");

//   logo.classList.toggle("fa-toggle-on");
//   logo.classList.toggle("fa-toggle-off");
//   if (logo.classList.contains("fa-toggle-off")) {
//     side.style.marginLeft = "-240px";
//     side.style.transition = "margin-left 0.3s ease;";
//   } else {
//     side.style.marginLeft = "0px";
//     side.style.transition = "margin-left 0.3s ease;";
//   }
// });
