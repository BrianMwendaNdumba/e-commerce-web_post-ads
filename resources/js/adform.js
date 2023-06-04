// Form logic

let continueButton = document.getElementById("continueButton");
let prevButton = document.getElementById("prevButton");
let adTabs = document.getElementsByClassName("ad_form_tab");
let ad_main_form = document.getElementById("ad_main_form");

continueButton.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo(0, 200);
    adTabs[0].classList.remove("form_tab_active");
    adTabs[1].classList.add("form_tab_active");
});

prevButton.addEventListener("click", function (e) {
    e.preventDefault();
    adTabs[1].classList.remove("form_tab_active");
    adTabs[0].classList.add("form_tab_active");
});
