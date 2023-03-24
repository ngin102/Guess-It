window.onload = function () {

  //Simple code to register which mode was selected
  let mode = document.querySelectorAll(".mode");
  for (let i = 0; i < mode.length; i++) {

    mode[i].addEventListener(
      "click",
      function () {

        localStorage.setItem("mode", mode[i].id)
        localStorage.setItem("try_toggle", false)
        localStorage.setItem("timer_toggle", false)
        localStorage.setItem('state', false)
        localStorage.setItem('state2', false)

      }, false);
  }
}