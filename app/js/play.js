const tries = document.querySelector('.tries')

/* Count for tries*/
if (JSON.parse(localStorage.getItem('try_toggle'))) {
  localStorage.setItem("count", 10)
  localStorage.setItem('condition', true)
  tries.innerHTML = localStorage.getItem("count")
} else {
  localStorage.removeItem("count")
}

/*Setting up our variables*/
let mode = localStorage.getItem('mode');
let word_to_guess = "";
let guesses_used = 0;
let today = new Date();
let day_of_word = today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();
let get_word = new XMLHttpRequest();

/*Different gamemodes based on mode selection*/
get_word.onload = function () {
  let wordArray = JSON.parse(get_word.responseText)
  if (mode === "mode2") {
    word_to_guess = wordArray[1];
  } else if (mode === "mode3") {
    word_to_guess = wordArray[2]
  } else if (mode === "mode4") {
    word_to_guess = wordArray[3]
  } else if (mode === "mode5") {
    word_to_guess = wordArray[4]
  } else {
    /*We can only play the regular game once a day*/
    if (localStorage.getItem('date') === day_of_word) {
      already()
    }
    word_to_guess = wordArray[0];
  }
  localStorage.setItem('hint', word_to_guess)
};
get_word.open("get", "./PHP/retrieve_word.php", true);
get_word.send();
localStorage.setItem('win', true);





// The localeCompare() method returns sort order -1, 1 or 0 (before, after or equal).
function search(ele) {


  if (event.key === 'Enter' && localStorage.getItem('win') === 'true') {
    let input = document.getElementById("guess");
    let string_guess = input.value.toLowerCase().trim();
    let content = document.createTextNode(string_guess.trim().toLowerCase().split(' ').map(capitalize).join(' '));
    input.value = "";
    guesses_used++;
    if (JSON.parse(localStorage.getItem('try_toggle'))) {
      if (localStorage.getItem('count') == 1) {
        tries.innerHTML = 'DONE'
        localStorage.setItem('win', false)

      } else {
        localStorage.setItem('count', localStorage.getItem('count') - 1);
        tries.innerHTML = localStorage.getItem('count');

      }
    }

    /*Numerical mode*/
    if (mode === "mode5") {
      if (parseInt(string_guess) > parseInt(word_to_guess)) {
        display(content, "./icons/green_arrow.png")
      } else if (parseInt(string_guess) < parseInt(word_to_guess)) {
        display(content, "./icons/red_arrow.png")
      } else if (parseInt(string_guess) === parseInt(word_to_guess)){
        redirect(content, mode)
      } else { 
        display(content, "./icons/red_arrow.png")
      }


    } else {

      // The guess is after the word that needs to be needed
      if (string_guess.localeCompare(word_to_guess) == 1) {
        console.log(string_guess)
        console.log(word_to_guess)
        display(content, "./icons/green_arrow.png")
      }
      // The guess is before the word that needs to be needed
      else if (string_guess.localeCompare(word_to_guess) == -1) {
        console.log(string_guess)
        console.log(word_to_guess)
        display(content, "./icons/red_arrow.png")

      //We want to user a different function for regular mode when we win
      } else {
        if (mode === "mode1") {
          win_regular(content)
        } else {
          redirect(content, mode)
        }

      }
    }
  } else if (localStorage.getItem('win') === 'false') {
    lose(word_to_guess)
  }
}

//Function when you lose, launches a modal
function lose(string_guess) {
  $(".modal").modal("show")
  document.getElementById("modal_title").innerHTML = "Loser!!!"
  let text = document.getElementById("loser_text");
  text.innerHTML = "You're clearly new at this game, you needed to guess: <a href = 'https://en.wikipedia.org/wiki/"+word_to_guess+"' target='_blank'> "+word_to_guess+"</a> ... Play again?"
  document.getElementById("modal_random").addEventListener('click', reset)
}


//displays the content and arrow associated with the word
function display(content, arrow) {
  const list_guess = document.getElementById("arrow_area");
  let div = document.createElement("div")


  if (arrow != null) {
    let elem = document.createElement("img");
    elem.setAttribute("src", arrow);
    elem.setAttribute("height", "30");
    elem.setAttribute("width", "30");
    div.appendChild(elem)
  }
  div.appendChild(content)
  let br = document.createElement("br");
  div.appendChild(br)
  list_guess.insertBefore(div, list_guess.children[0])
}

//We capitalize the string to regulate the user input
function capitalize(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

//If you win, a prompt is active to enter your name on the leaderboard! How fun!
function win_regular(content) {
  display(content, null)

  localStorage.setItem('win', false)
  localStorage.setItem('date', day_of_word)


  let leaderboard_prompt = "";
  while (leaderboard_prompt == "" || leaderboard_prompt == null) {
    leaderboard_prompt = prompt("Winner! Please enter your name for the leaderboard");
  }
  if (leaderboard_prompt != "") {
    leaderboard_prompt = leaderboard_prompt.trim();
    let entries = [];
    let entry = {};
    entry.player_name = leaderboard_prompt;
    entry.guesses = guesses_used;
    entry.day_of_word = day_of_word;

    entries.push(entry);

    //Ajax call to give the name of the player, the word and the guesses to the database
    $.ajax({
      url: "php/add_data.php",
      method: "post",
      data: { entries: JSON.stringify(entries) },
      success: function (res) {
      }
    })
    redirect(content, mode);
  }
 
}

//Reset the game
function reset() {
  localStorage.setItem('timeSecond', 2 * 60)
  window.location.href = "index.php"
}

//Launch leaderboard window
function leader(){
  window.location = "leaderboard.php";
}

//We redirect to either the index or leaderboard if regular mode. We added a link to wikipedia to search up the word too
function redirect(content, mode) {
  display(content, null)
  localStorage.setItem('win', false)
  $(".modal").modal({backdrop: 'static', keyboard: false}) 
  $(".modal").modal("show")
  document.getElementById("modal_title").innerHTML = "Winner!!!"
  let text = document.getElementById("loser_text");
  if (mode === "mode5"){
    text.innerHTML = "Nice, I guess you're good. Play again?"
  }else{
    text.innerHTML = "Nice, I guess you're good. Need more info? <a href = 'https://en.wikipedia.org/wiki/"+word_to_guess+"' target='_blank'> "+word_to_guess+"</a> ... Play again?"
  }
  document.getElementById("modal_random").addEventListener('click', reset)

  if(mode === "mode1"){
    document.getElementById("modal_leader").addEventListener('click', leader)
    document.getElementById("modal_leader").hidden = false;
  }
  
}


//Youve already played the regular mode for the day!
function already() {
  $(".modal").modal({backdrop: 'static', keyboard: false})  
  $(".modal").modal("show")
  document.getElementById("modal_title").innerHTML = "Nope"
  let text = document.getElementById("loser_text");
  text.innerHTML = "You've played this already ... Play a different mode?"
  document.getElementById("modal_random").addEventListener('click', reset)
}