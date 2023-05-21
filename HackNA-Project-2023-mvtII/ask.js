var backButton = document.getElementById("oButtonBack");

backButton.addEventListener("click", function() {
  window.open('index.html');
  return false;
});

//Service ID: service_tzy1l7e
//Template ID: template_4vvmxub

var serviceID = 'service_tzy1l7e';
var templateID = 'template_4vvmxub';
var publicKey = 'TZ5mLmM4GKxl3OG3J';

function sendEmail(title, name, topic, question, email) {
  var templateParams = {
    title: title,
    name: name,
    topic: topic,
    question: question,
    email: email
  }
  emailjs.send(serviceID, templateID, templateParams, publicKey);
}


document.getElementByID("").addEventListener("click", function() {

});
sendEmail('test', 'name', 'topic', 'my question', document.getElementByID("oEmailField").value);