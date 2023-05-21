var askButton = document.getElementById("oButtonAsk")
var answerButton = document.getElementById("oButtonAnswer");
var signUpButton = document.getElementById("oButtonSignUp");

var signedIn = false;
var account = null;

askButton.addEventListener("click", function() {
  window.open('ask.php');
  return false;
});

answerButton.addEventListener("click", function() {
  window.open('answerforms.php');
  return false;
});

signUpButton.addEventListener("click", function() {
  window.open('signup.html');
  return false;
});

// a:10:{i:0;a:1:{i:0;a:0:{}}i:1;a:1:{i:0;a:0:{}}i:2;a:1:{i:0;a:0:{}}i:3;a:1:{i:0;a:0:{}}i:4;a:1:{i:0;a:0:{}}i:5;a:1:{i:0;a:0:{}}i:6;a:1:{i:0;a:0:{}}i:7;a:1:{i:0;a:0:{}}i:8;a:1:{i:0;a:0:{}}i:9;a:1:{i:0;a:0:{}}} is for replies.txt standard with 10 questions


