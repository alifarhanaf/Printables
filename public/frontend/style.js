const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const signup = document.querySelector("#signup");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
signup.addEventListener("click",() => {
  // container.classList.add("sign-up-mode");
  console.log('Hi');
  // alert('Hi');

  // var the_cookie = "signup=yes;" ; 
  // document.cookie = the_cookie;

  var date = new Date();
   date.setTime(date.getTime()+(30*1000));
   var expired = "; expires="+date.toGMTString();
   document.cookie = "error=available; max-age=" +5 ;
});
