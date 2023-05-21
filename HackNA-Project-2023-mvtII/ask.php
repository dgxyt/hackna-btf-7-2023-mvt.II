<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Ask a question</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="fav.ico">
  <style>
  body {
      color: #fff;
      background-color: #222;
      transition: color 0.3s ease, background-color 0.3s ease;
    }

    body.dark-mode {
      color: #333;
      background-color: #f1f1f1;
    }

    .toggle-mode {
      background-color: transparent;
      border: none;
      cursor: pointer;
      font-size: 36px;
      position:absolute; top:0; right:0;
    }
  </style>
</head>

<body>
  <button class="button" id="oButtonBack" type="button">Back</button>

  <h2>Ask a Question</h2>
  <form id="askForm" name="askForm" action="answerforms.php" method="post">
    <fieldset align="center"><input type="text" id="oInTitleField" class="textInputField" autocomplete="on" required
        name="oInTitleField" style="width:30%" placeholder="Title" maxlength="50"><input type="text"
        id="oInNameField" class="textInputField" name="oInNameField" autocomplete="on" style="width:30%" required
          placeholder="Name" maxlength="50"><input name="oInTopicField" type="text" id="oInTopicField"
        class="textInputField" style="width:30%" autocomplete="on" required placeholder="Topic"
        maxlength="50"><br><!--default values of topic and title removed--><textarea id="oInQuestionField" name="oInQuestionField" class="textInputField"
        style="width:90%;padding-bottom: 200px;flex-wrap: 10;" autocomplete="on" minlength="8" required
        placeholder="Question" size="300" form="askForm"></textarea><br><input type="email" placeholder="E-mail   (this will not be shared.)" name="oEmailField" id="oEmailField" class="textInputField" style="width:90%" autocomplete="on"></input></fieldset>
    <br><input type="submit" class="button">


    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
       (function(){
          emailjs.init("TZ5mLmM4GKxl3OG3J");
       })();
    </script>
    
    
    <script src="ask.js"></script>
    
     <button class="toggle-mode" onclick="toggleDarkMode()">&#9788;</button>

  <script>
    function toggleDarkMode() {
      var body = document.querySelector('body');
      body.classList.toggle('dark-mode');

  </script>
    <!--data.php is a:1:{i:0;a:5:{i:0;s:8:"testtest";i:1;s:8:"testtest";i:2;s:8:"testtest";i:3;s:8:"testtest";i:4;s:14:"test@test.test";}} as an empty

    0. title, 1. name, 2. topic, 3. question, 4. email
    -->
  </form>
</body>

</html>