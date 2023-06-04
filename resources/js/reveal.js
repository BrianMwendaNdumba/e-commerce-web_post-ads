const reveal_button = document.querySelector(".reveal_button");
const fake_contact = document.querySelector(".fake_contact");
const real_contact = document.querySelector(".real_contact");

reveal_button.addEventListener("click", () => {
    fake_contact.style.display = "none";
    real_contact.style.display = "inline-block";
});
