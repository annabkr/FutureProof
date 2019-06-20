<!----// Website for CS 312, Internet Concepts by Anna Baker--->
<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments'];
    $to = 'Anna Baker <hbake005@odu.edu';
    $subject = 'You have received feedback';
    $headers = [];
    $headers[] = 'From: santaclaus@northpole.com'; 
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    require './mail/mailprocessing.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutureProof - Join The Movement</title> 
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- // Introduction -->
    <header id="intro">
        <nav>
            <img class="logo" src="images/logo.png" alt="FutureProof - Join The Movement" width = 50>
            <a href="#about">Home</a>
            <a href="#whatIsUBI">What is UBI?</a>
            <a href="#benefits">Benefits of UBI</a>  
        </nav>
        <div class="content-wrap-header"> 
            <div class="col-header"> 
                <h1>FutureProof:</h1>
                <h2> Why Universal Basic Income is The Answer<br> 
            </div>  
 <div class="content-wrap">   
            <a href="images/present.gif"><img class ="terminator" src="images/terminator.png" alt="Psssst....I have a present for you"></a>
            <center><h2 id="terminatorMagic"> Click this text to find out a secret....</h2> </center>
            <script src = "script.js">
            </script>
      </div>
        </div>   
        
    </header>

    <main>  
        <!-- // What is UBI? ----> 
        <section class="whatIsUBI" id="whatIsUBI">
            <div class="content-wrap"> 
                <h2>What is UBI?</h2> 
                    <ul>
                        <li>Universal Basic Income (UBI) is the concept of the government providing every citizen with a certain amount of income, regardless of other income or employment.</li><br>
                        <li>Under this model, most forms of welfare would be eliminated and instead provided with a basic living wage.</li><br>
                        <li>Please view the following video for further information: </li><br>
                    </ul> 
                     <center><iframe width="560" height="315" src="https://www.youtube.com/embed/kl39KHS07Xc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br></center>
                </div>
                
        </section>

        <!-- // Benefits of a UBI Model -->
        <section class="benefits" id="benefits">
            <div class="content-wrap">
                <h2>Benefits of UBI</h2>
                 <ul>
                    <li>It is estimated that poverty would be eliminated or greatly reduced through the use of UBI.</li><br>
                    <li>In a society where income inequality is growing at an alarming rate, this could help to even the playing field -- or at least prevent working families from starving or being unable to afford to live</li><br>
                    <li>Robot automation (robots replacing humans in the workforce) is increasing, with no suggestion that it will slow down anytime soon.</li><br>
                    <li>In fact, leading industry experts such as Elon Musk believe that technical singuarlity (the point at which AI will be able to program itself and survive independent of humans) is approaching.</li><br>
                    <li>We recommend watching the following video for further information about technical singularity: </li><br>
                    <br>
                    <center><iframe width="560" height="315" src="https://www.youtube.com/embed/EyFYFjESkWU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>

                    </ul> 
            </div>
        </section>

        <section class="form" id="form"> 
            <div class="content-wrap">

                <img src="images/jointhemovement.png" alt="FutureProof - Join The Movement" width = 300px><br> 
                <?php if ($_POST && $suspect) : ?>
                <p class="warning">Sorry, your message wasn't able to be sent.</p>
                <?php elseif ($errors || $missing) : ?>
                <p class="warning">Please fix the following items.</p>
                <?php endif; ?>
                <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">

                  <p>
                    <label for="name">Name:
                    <?php if ($missing && in_array('name', $missing)) : ?>
                        <span class="warning">Please enter your name</span>
                    <?php endif; ?>
                    </label>
                    <input type="text" name="name" id="name"
                        <?php
                        if ($errors || $missing) {
                            echo 'value="' . htmlentities($name) . '"';
                        }
                        ?>
                        >
                  </p>

                  <p>
                    <label for="email">Email:
                        <?php if ($missing && in_array('email', $missing)) : ?>
                            <span class="warning">Please enter your email address</span>
                        <?php endif; ?>
                    </label>
                    <input type="email" name="email" id="email"
                        <?php
                        if ($errors || $missing) {
                            echo 'value="' . htmlentities($email) . '"';
                        }
                        ?>
                        >
                  </p>

                  <p>
                    <label for="comments">Comments:
                        <?php if ($missing && in_array('comments', $missing)) : ?>
                            <span class="warning">You forgot to add any comments</span>
                        <?php endif; ?>
                    </label>

                      <textarea name="comments" id="comments"><?php
                          if ($errors || $missing) {
                              echo htmlentities($comments);
                          }
                          ?></textarea>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send">
  </p>
</form>
</body>
</html>
