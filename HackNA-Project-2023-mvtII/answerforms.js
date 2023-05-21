var backButton = document.getElementById("oButtonBack");
var currentSearchDiv = document.getElementById("currentSearch");
var questionListDiv = document.getElementById("questionlist");

backButton.addEventListener("click", function() {
  window.open("index.html");
  return false;
});

function replyBC(index, replies) {
  replySec = document.getElementById("replySection" + String(index));
  //show replies + make reply + do php for rep sub
   var replySection = "<br><form name='replyform" + index + "' id='replyform" + index + "' action='answerforms.php' method='post'><textarea id='oInReplyField" + index + "' name='oInReplyField' class='textInputField' style='width:60%;padding-bottom: 0px;' autocomplete='on' required placeholder='Response' form='replyform" + index + "'></textarea><input type='text' id='oInNameFieldR" + index + "' class='textInputField' name='oInNameFieldR' autocomplete='on' style='width:30%' required placeholder='Name' maxlength='50'><input type='number' style='opacity:0%; width:0%; height:0%' readonly required value='" + index + "' name='iPostIndexR' id='oPostIndexR" + index + "' class='textInputField'><input type='submit' class='button'></form>"
  var currentReplies = "";
  if (replies != null) {
    for (let i=0; i<replies.length; i++) {
      repl = replies[i];
      currentReplies = currentReplies + "<br>" + repl[0] + " - By: " + repl[1];
    }
  }
  replySec.innerHTML = currentReplies + "<br>" + replySection;
}

/* [php]
    function saveReply($reply, $repname, $index) {
      $currentreplies = unserialize(file_get_contents("replies.txt"));
      $currentreplies[$index] = array($reply, $repname);        
    file_put_contents(serialize($currentreplies));
    }
    
(php in js)
$currentreplies=unserialize('replies.txt'); $currentreplies[" + index + "] = array($_POST['oInReplyField'], $_POST['oInNameFieldR']); file_put_contents(serialize($currentreplies))
*/

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
  document.getElementById("emailsendbutton").remove();
}

/*
document.getElementById("").addEventListener("click", function() {

});*/
//sendEmail('test', 'name', 'topic', 'my question', document.getElementById("oEmailField").value);