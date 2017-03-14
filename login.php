<?php
  session_start();
  include("include/header.php");
?>

  <main>
    <div class="container text-center">
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
          <h1>Login</h1>
          <h3>Enjoy our Math Game!</h3>
          <p style="color: rgb(251, 81, 75);">Use account <b>a@a.a</b> and password <b>aaa</b> to login!</p>
          <div class="container">

          </div>
        </div>
      </div>
    </div>
  </main>

    <?php

      $loginErr = '';

    ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
          <form class="form-horizontal text-center"
                role = "form"
                action="index.php"
                method = "post">
            <h4 class="error-msg"><?php if (isset($_GET["msg"])) echo $_GET["msg"];?></h4>
            <input class="form-control"
                   type="email"
                   name="email"
                   placeholder="Enter Email"
                   required>
            <input type = "password"
                   class = "form-control"
                   name = "password"
                   placeholder = "Enter Password"
                   required>
            <button class = "btn btn-lg btn-primary"
                    type = "submit"
                    name = "submit">Login</button>
            <button class = "btn btn-lg btn-primary"
                    type = "reset"
                    name = "reset">Clear</button>
          </form>
        </div>
      </div>
    </div>

<?php include("include/footer.php"); ?>
