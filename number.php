<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Number Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Guess the Number Game</h1>
        <p class="text-center">Try to guess the number between 1 and 10.</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>

<?php

//Generate a random number
$randomNumber = rand(1, 10);

//Create button to submit a guess
echo '<form method="post" action="">
        <div class="m-3">
            <label for="guess" class="form-label">Enter your guess (1-10):</label>
            <input type="number" class="form-control" id="guess" name="guess" min="1" max="10" required>
        </div>
        <div class="m-3">
        <button type="submit" class="btn btn-dark">Submit Guess</button>
        </div>
      </form>';

//Store the guess from the user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guess = intval($_POST['guess']);

    //Check if the guess is valid
    if ($guess < 1 || $guess > 10) {
        echo '<div class="alert alert-danger" role="alert">Please enter a number between 1 and 10.</div>';
    } else {
        //Compare the guess with the random number, and return a message
        if ($guess < $randomNumber) {
            echo '<div class="m-3 alert alert-warning" role="alert">You guessed ' . $guess . '. The correct answer is higher.</div>';
        } elseif ($guess > $randomNumber) {
            echo '<div class="m-3 alert alert-warning" role="alert">You guessed ' . $guess . '. The correct answer is lower.</div>';
        } else {
            echo '<div class="m-3 alert alert-success" role="alert">You guessed ' . $guess . '. This is the correct answer!</div>';
        }
    }
}   
?>
