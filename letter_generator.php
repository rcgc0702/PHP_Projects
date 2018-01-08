<?php require 'theletter.php' ?>

<!DOCTYPE html>
<html>
  <head>
    <script src="dist/clipboard.min.js"></script>
    <meta charset="utf-8">
    <title>Creating Letter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>

<div class="container-fluid">
    <div class="row">
      <div class="col-5">
        <?php if (isset($_GET['graduating'])): ?>
            <h1>Test Letters</h1>
            <a class="btn btn-outline-warning btn-sm" href="letter_generator.php?graduating=yes" role="button">Test Letter</a>
            <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php?info_letter=yes" role="button">Info Letter</a>
            <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php" role="button">Levels Letter</a>
        <?php elseif (isset($_GET['info_letter'])): ?>
          <h1>Info Letters</h1>
          <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php?graduating=yes" role="button">Test Letter</a>
          <a class="btn btn-outline-warning btn-sm" href="letter_generator.php?info_letter=yes" role="button">Info Letter</a>
          <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php" role="button">Levels Letter</a>
        <?php else: ?>
          <h1>Levels Letters</h1>
          <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php?graduating=yes" role="button">Test Letter</a>
          <a class="btn btn-outline-secondary btn-sm" href="letter_generator.php?info_letter=yes" role="button">Info Letter</a>
          <a class="btn btn-outline-warning btn-sm" href="letter_generator.php" role="button">Levels Letter</a>
        <?php endif; ?>

            <form class="" action="letter_generator.php" method="get">

              <div class="form-group">
                <label for="student">Student Name:</label>
                <input class="form-control required="true" form-control-sm" type="text" name="student" value="">
              </div>
        <div class="form-group form-inline">
          <label for="level" class="col-4 ml-0 mr-0 pl-0">Level: </label>
          <select class="form-control form-control-sm" name="level" required="true">
            <?php if (isset($_GET['graduating'])): ?>
              <option value="7">Exam Videos</option>
            <?php elseif (isset($_GET['info_letter'])): ?>
           <option>-- Select an Option --</option>
              <option value="0">Sandbox</option>
              <option value="6">Exam Information</option>
            <?php else: ?>
              <option value="1">Level 1 - English</option>
              <option value="2">Level 2 - Spanish</option>
              <option value="3">Level 3 - Chinese</option>
              <option value="4">Level 4 - Korean</option>
              <option value="5">Level 5 - Multiple</option>
            <?php endif; ?>
          </select>
        </div>
        <?php if (!isset($_GET['info_letter'])): ?>
         <div class="form-group form-inline">
             <label for="channel" class="col-4 ml-0 mr-0 pl-0">Video 1 Channel:</label>
                   <input class="form-control form-control-sm" type="text" name="channel" value="" <?php echo isset($_GET['info_letter']) ? 'placeholder="Not Required"' : 'placeholder="Channel"'; ?>>
         </div>
         <div class="form-group form-inline">
             <label for="channel" class="col-4 ml-0 mr-0 pl-0">Video 1 Link:</label>
                   <input class="form-control form-control-sm" type="text" name="link" value="" <?php echo isset($_GET['info_letter']) ? 'placeholder="Not Required"' : ''; ?>>
         </div>
         <div class="form-group form-inline">
           <label for="episode" class="col-4 ml-0 mr-0 pl-0">Video 1 Episode:</label>
                 <input class="form-control form-control-sm" type="text" name="episode" value="" <?php echo isset($_GET['info_letter']) ? 'placeholder="Not Required"' : ''; ?>>
         </div>
         <div class="form-group form-inline">
           <label for="Part" class="col-4 ml-0 mr-0 pl-0">Video 1 Part: </label>
                 <input class="form-control form-control-sm" type="text" name="part" value="" <?php echo isset($_GET['info_letter']) ? 'placeholder="Not Required"' : ''; ?>>
         </div>
         <?php endif; ?>
         <?php if (!empty($_GET['graduating'])): ?>
           <div class="form-group form-inline" id="set1">
               <label for="channel" class="col-4 ml-0 mr-0 pl-0">Video 2 Channel:</label>
                     <input class="form-control form-control-sm" type="text" name="channel2" value="" placeholder="Channel">
           </div>
           <div class="form-group form-inline">
               <label for="channel" class="col-4 ml-0 mr-0 pl-0">Video 2 Link:</label>
                     <input class="form-control form-control-sm" type="text" name="link2" value="">
           </div>
           <div class="form-group form-inline">
             <label for="episode" class="col-4 ml-0 mr-0 pl-0">Video 2 Episode:</label>
                   <input class="form-control form-control-sm" type="text" name="episode2" value="">
           </div>
           <div class="form-group form-inline">
             <label for="Part" class="col-4 ml-0 mr-0 pl-0">Video 2 Part: </label>
                   <input class="form-control form-control-sm" type="text" name="part2" value="">
           </div>
         <?php endif; ?>

         <div class="form-group form-inline">
           <label for="sensei" class="col-4 ml-0 mr-0 pl-0">Sensei:</label>
                 <input  class="form-control form-control-sm" type="text" name="sensei" value="" placeholder="Sensei 1">
         </div>
         <?php if (!empty($_GET['graduating'])): ?>
           <div class="form-group form-inline">
             <label for="sensei" class="col-4 ml-0 mr-0 pl-0">Sensei:</label>
                   <input  class="form-control form-control-sm" type="text" name="sensei2" value="" placeholder="Sensei 2">
           </div>
         <?php endif; ?>
         <div class="form-group form-inline">
           <label for="assigner" class="col-4 ml-0 mr-0 pl-0">Assigner:</label>
                 <input class="form-control form-control-sm" required="true" type="text" name="assigner" value="">
         </div>

        <button type="submit" class="btn btn-primary">Populate Letter</button>
            </form>
      </div>
      <div class="col-7">
        <?php

        if (count($_GET)>1) {
            
            $student = new studentLetter;
            $student->addstudentLetter($_GET['student'],$_GET['level'],$_GET['assigner']);
            echo $student::student_level_A;


          if (array_key_exists("channel", $_GET)||array_key_exists("episode", $_GET)||array_key_exists("part", $_GET)||array_key_exists("link", $_GET)) {
            $channel = $_GET['channel'];
            $episode = $_GET['episode'];
            $part = $_GET['part'];
            $linkme = $_GET['link'];
          } else {
            $channel = "";
            $episode = "";
            $part = "";
            $linkme = "";
          }

//          $sensei = $_GET['sensei'];
//          $assigner = $_GET['assigner'];

          if (count($_GET)<9) {
            $sensei2 = "";
            $channel2 = "";
            $episode2 = "";
            $part2 = "";
            $linkme2 = "";
          } else {
            $sensei2 = $_GET['sensei2'];
            $channel2 = $_GET['channel2'];
            $episode2 = $_GET['episode2'];
            $part2 = $_GET['part2'];
            $linkme2 = $_GET['link2'];
          }

          echo "<h1>".$student." - ";
          level_update($student_level);
          echo "</h1>";
          echo "<p><a href=\"http://www.viki.com/messages/new?username=".$student."\">Send Message</a>
          </p>";
        } else {
          echo "<h1>No Student Entered.</h1>";
        }
         ?>
<textarea class="form-control" name="name" rows="8" cols="40" id="bar"><?php if (isset($_GET['student'])) {
  addletter($student_level,$student,$channel,$episode,$part,$linkme,$sensei,$sensei2,$channel2,$episode2,$part2,$linkme2,$assigner);
}?></textarea>


<script src="dist/clipboard.min.js"></script>

<!-- 3. Instantiate clipboard by passing a string selector -->
<script>
var clipboard = new Clipboard('.btn');
clipboard.on('success', function(e) {
    console.log(e);
});
clipboard.on('error', function(e) {
    console.log(e);
});
</script>
<button class="btn btn-success" data-clipboard-action="cut" data-clipboard-target="#bar">COPY</button><p></p>
<div class="alert alert-success" role="alert">
  <strong>Updated!</strong> August 18, Level 3 template.
</div>

         </div>
      </div>
    </div>
</div>


  </body>
</html>
