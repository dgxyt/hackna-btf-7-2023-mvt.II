<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Threads</title>
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
  <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
       (function(){
          emailjs.init("TZ5mLmM4GKxl3OG3J");
       })();
    </script>
  <button class="button" id="oButtonBack" type="button">Back</button>

  <h2>Current Threads and Answers</h2>
  <!--put image thing here, if needed-->
  <?php error_reporting(E_ALL ^ E_WARNING);
    function saveReply($reply, $repname, $index) {
      $currentreplies = unserialize(file_get_contents("replies.txt"));
      $reply = str_replace("\"", "", $reply);
      $reply = str_replace("'", "", $reply);
      $repname = str_replace("\"", "", $repname);
      $repname = str_replace("'", "", $repname);
      if ($currentreplies[$index] != null) {
        $destinarray = $currentreplies[$index];
      } else {
        $destinarray = array();
      }
      $destinarray[] = array($reply, $repname);   
      $currentreplies[$index] = $destinarray;
    file_put_contents("replies.txt", serialize($currentreplies));
    }
    if ($_POST["oInReplyField"] != null) {
      saveReply($_POST["oInReplyField"], $_POST["oInNameFieldR"], $_POST["iPostIndexR"]);
    }
    if ($_POST["oInQuestionField"] != null) {
      echo "Thank you for responding! Our agents will contact* you within 48 hours. <button class=\"button\" type=\"button\" id=\"emailsendbutton\" onclick='sendEmail(\"{$_POST["oInTitleField"]}\", \"{$_POST["oInNameField"]}\",\"{$_POST["oInTopicField"]}\",\"{$_POST["oInQuestionField"]}\",\"{$_POST["oEmailField"]}\")'>Click to confirm to send E-mail</button>";
    }
  ?><form id="searchForm" name="searchForm" action="answerforms.php" method="GET">
    <label for="searchBar">Search by Topic</label>
    <input type="text" class="textInputField" autocomplete="on" required name="searchBar" id="searchBar"
      placeholder="Search..." maxlength="50">
  </form>
  <span>Current Search Query: <span id="currentSearch"><?php
        if ($_GET["searchBar"] != null) {
          echo htmlspecialchars($_GET["searchBar"]); 
          } else {
          echo "none";
          }
      ?></span>
  </span> 
  <hr><?php $datafile = getcwd() . "data.txt";
        if ($_POST["oInQuestionField"] != null) {
          $titlefieldR = str_replace("\"", "", $_POST["oInTitleField"]);
          $titlefieldR = str_replace("'", "", $titlefieldR);
          $namefieldR = str_replace("\"", "", $_POST["oInNameField"]);
          $namefieldR = str_replace("'", "", $namefieldR);
          $topicfieldR = str_replace("\"", "", $_POST["oInTopicField"]);
          $topicfieldR = str_replace("'", "", $topicfieldR);
          $qfieldR = str_replace("\"", "", $_POST["oInQuestionField"]);
          $qfieldR = str_replace("'", "", $qfieldR);
          $submissiondata = array($titlefieldR, $namefieldR, $topicfieldR, $qfieldR, $_POST["oEmailField"]);
          $currentdata = unserialize(file_get_contents("data.txt"));
          $newdata = array_merge($currentdata, array($submissiondata));
          file_put_contents("data.txt", serialize($newdata));
        }
      ?>
  <div id="questionlist">
    <?php $questionlist = unserialize(file_get_contents("data.txt"));
      $replylist = unserialize(file_get_contents("replies.txt"));
      $stringblock = "";
      $currentnum = -1;
      foreach ($questionlist as $i) {
        $currentnum = $currentnum + 1;
        $questionrepls = $replylist[$currentnum];
        $questionrepls = json_encode($questionrepls);

        
        $stringblock = "<div><h4>{$i[0]}</h4><span><h5>By: {$i[1]}<span><br>Topic: {$i[2]}</h5><div>{$i[3]}</div><span><button class=\"button\" onclick='replyBC({$currentnum}, {$questionrepls})'>View Replies</button></span><br><span id=\"replySection{$currentnum}\" type=\"button\"></span><hr></div>"; 
        if ($_GET["searchBar"] != null) {
          if (str_contains(mb_strtolower($i[2]), mb_strtolower($_GET["searchBar"])) or str_contains(mb_strtolower($_GET["searchBar"]), mb_strtolower($i[2]))) {
            echo $stringblock;
          }
        } else {
          echo $stringblock;
        }
      }
    ?>
  </div>
  <script src="answerforms.js"></script>
  
   <button class="toggle-mode" onclick="toggleDarkMode()" >&#9788;</button>

  <script>
    function toggleDarkMode() {
      var body = document.querySelector('body');
      body.classList.toggle('dark-mode');

      
    }
  </script>
</body>

</html> 