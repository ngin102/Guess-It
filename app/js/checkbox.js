function load() {
  let checked_timer = JSON.parse(localStorage.getItem('timer_toggle'));
  let checked_try = JSON.parse(localStorage.getItem('try_toggle'));
  document.getElementById("toggle_1").checked = checked_timer;
  document.getElementById("toggle_2").checked = checked_try;

  localStorage.setItem('resetTimer', "false");



}


load();

let title1 = document.getElementById("whole_timer");
let title2 = document.getElementById("whole_tries");
let button = document.getElementById("apply")
let timer = document.getElementById("selected_timer");
let tries = document.getElementById("selected_guess");



let mode = localStorage.getItem('mode');

if (mode === "mode1") {
  disable()
}

/*Function to hide our checkboxes*/
function disable() {
  button.style.display = "none"
  title1.style.display = "none"
  title2.style.display = "none"
  timer.style.display = "none"
  tries.style.display = "none"
}


/*Timer Checkbox*/
let checkbox1 = document.getElementById("toggle_1");
checkbox1.addEventListener('change', e => {

  if (e.target.checked) {
    localStorage.setItem('state', checkbox1.checked)
  } else {
    console.log("boo")
    localStorage.setItem('state', checkbox1.checked)
  }

}, 1000);

/*Tries Checkbox*/
let checkbox2 = document.getElementById("toggle_2");
checkbox2.addEventListener('change', e => {
localStorage.setItem('resetTimer', "true")
  if (e.target.checked) {
    localStorage.setItem('state2', checkbox2.checked)
  } else {
    localStorage.setItem('state2', checkbox2.checked)
  }
}, 1000);


document.getElementById("apply").addEventListener('click', function () {
  localStorage.setItem('timer_toggle', localStorage.getItem('state'));
  localStorage.setItem('try_toggle', localStorage.getItem('state2'));


}, 1000);


