const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
  $("#logUN").removeAttr("autofocus");
  $("#regUN").attr("autofocus","autofocus").focus(); 
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
  $("#regUN").removeAttr("autofocus");
  $("#logUN").attr("autofocus","autofocus").focus(); 
});
