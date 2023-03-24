<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Instructions</title>
    <link rel="stylesheet" href="./CSS/instructions.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>
      <div class = "container">
        <div class = "back">
          <img onclick = "history.back()" src="./icons/back.png" width = "50" height = "50" id = "back_instructions" > </a>
        </div>

        <div class = "titlebox"> <h1 class = "title">HOW TO PLAY</h1> </div>
      </div>

  	  <p class = "lead" style = "font-family: Arial, sans-serif; font-weight: bold; color: black; text-align: center;" >
        "Guess It" is a word-guessing game in which you must guess an English word.<br>If you guess a word that is alphabetically before the one you're supposed to guess,<br>a green arrow will point up; if it comes after, a purple arrow will point down.<br>Keep guessing until you "Guess It!"</p>
        
      <h3 class = "subtitle">Game Modes</h3>
        
      <h4 class = "subheader">Regular Mode</h4>
      <p class = "normal_text">Guess the "Word of the Day." The "Word of the Day" changes every day.<br>Check the leaderboard to see how your score compares to the scores of other players.</p>
        
      <h4 class = "subheader">Random Mode</h4>
      <p class = "normal_text">This is the non-competitive practice mode of the game. This mode does not have a leaderboard.<br>Instead of a "Word of the Day," you will be given a randomly generated word to guess.<br>You can play this mode as many times as you want in a day.<br>You can add a timer, a guess limit, or both to challenge yourself!</p>

      <h4 class = "subheader">Celebrity Mode</h4>
      <p class = "normal_text">Similar to Random Mode, but instead of guessing a word, you guess a celebrity's name.<br>We hope you'll (Tom) Cruise through this one.</p>

      <h4 class = "subheader">Education Mode</h4>
      <p class = "normal_text">Similar to Random Mode, but all of the words you must guess are scientific in nature.<br>We, too, enjoy learning.</p>

      <h4 class = "subheader">Number Mode</h4>
      <p class = "normal_text">Similar to Random Mode, but instead of guessing a word, you guess a number.</p>

      <h3 class = "subtitle">Hint</h3>
      <p class = "normal_text">If the game is too difficult for you and you need some assistance, don't worry, you can get a hint!<br>Hints are available for all Game Modes.</p>

      <br>
  </body>
</html>