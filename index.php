<?php
include("include/header.php");

session_start();

if (isset($_PUSH['submit'])) {
  $name = $_POST['email'];
    if (isset($_POST['email']) && (isset($_POST['password']))) {
      if ($_POST['email'] != 'a@a.a' || $_POST['password'] != "aaa") {
           $loginErr = 'Invalid email or password. Try again.';
           header("Location: login.php?msg=$loginErr");
           die();
       }
   }
}

?>
  <main>
     <div class="container text-center">
       <div class="row">
         <div class="col-xs-6 col-xs-offset-3">
           <h1>Math Game</h1>
           <h4><?php echo "Welcome!"; ?></h4>
           <hr class="hr-small" />
         </div>
       </div>
     </div>
     <form action="index.php" method="post" role="form" class="form-horizontal">
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4 text-center">

          <?php
          // INIT ONCE UPON LOADING.
          if (!isset($_SESSION['total']))
          {
            $_SESSION['total'] = 0;
            $_SESSION['correct'] = 0;
          }
          if (!isset($_SESSION['answer-value'])) {
            $_SESSION['answer-value'] = 0;
          }

          $hasAnswer = isset($_SESSION['answer-value']);
          $hasEntry = isset($_POST['answer']);

          $answerMsg = 'blah';
          if ($hasAnswer) {
          // IF ANSWER FROM SUBMIT == ANSWER FROM PREVIOUS
            if (isset($_POST['answer'])) {
              if ($_POST['answer'] == $_SESSION['answer-value']) {
                $_SESSION['total']++;
                $_SESSION['correct']++;
                $answerMsg = "<h5 class=\"correct\">CORRECT</h5>";
              } elseif($_POST['answer'] != $_SESSION['answer-value']) {
                $_SESSION['total']++;
                $answerMsg = "<h5 class=\"incorrect\">INCORRECT. The answer is " . $_SESSION['answer-value'] . "</h5>";
              }
            }
          }

          // RANDOMIZED ASSIGNMENTS
          $leftValue = rand(1, 20);
          $rightValue = rand(1, 20);
          $ops = array('+','-');
          $rand_key = array_rand($ops);
          $operator = $ops[$rand_key];

          // CALCULATIONS
          if ($operator == '+') {
            $_SESSION['answer-value'] = $leftValue + $rightValue;
          } elseif ($operator == '-') {
            $_SESSION['answer-value'] = $leftValue - $rightValue;
          }

          ?>

          <label class="left-value"><?php echo $leftValue ?></label>
          <label class="operator"><?php echo $operator ?></label>
          <label class="right-value"><?php echo $rightValue ?></label>
        </div>
      </div>
      <input type="hidden" name="total" value="<?php echo $_SESSION['correct']; ?>" />
      <input type="hidden" name="score" value="<?php echo $_SESSION['total']; ?>" />
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
            <input type="number" class="form-control" id="answer" name="answer" placeholder="Enter Answer" required>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-offset-4">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit-answer" class="btn btn-primary btn-sm">
          Submit</button>
          <h4 class="error-msg"><?php if (isset($_GET["noanswer"])) echo $_GET["noanswer"];?></h4>
        </div>
        <div class="col-sm-3"></div>
    </div>
</form>
<hr class="hr-small" />
<div class="row">
  <div class="col-xs-4 col-xs-offset-4 text-center">
    <div class="col-sm-4 col-sm-offset-4">
      <?php
        if ($hasEntry) {
          echo "<h5>" . $answerMsg . "</h5>";
        }
        echo "<br /> <h4>Score:</h4>";
        echo "<h4>" . $_SESSION['correct'] . " / " . $_SESSION['total'] . "</h4>";
      ?>
    </div>
  </div>
    <div class="col-sm-4"></div>
</div>

</main>

<?php include("include/footer.php"); ?>
