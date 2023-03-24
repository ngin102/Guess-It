//Toast to display our hint
let toastTrigger = document.getElementById('toastbtn')
let toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', function () {
    let toast = new bootstrap.Toast(toastLiveExample)

    document.getElementById('hint').innerHTML = "The length of your guess should be: " + localStorage.getItem('hint').length + "!"
    toast.show()
  })
}



//Display function of the time in our html
function displayTime(second) {
  const min = Math.floor(second / 60);
  const sec = Math.floor(second % 60);
  timeH.innerHTML = `${min < 10 ? '0' : ''}${min}:${sec < 10 ? '0' : ''}${sec}`
}


//Ending our timer and launching the prompt to lauching the leaderboard.
function endTime() {
  timeH.innerHTML = 'TIME OUT'
  localStorage.setItem('win', false)
}

const timeH = document.querySelector('.time')

//Our timer logic, if checkbox is checked then we display time but we reset if tries it checked/unchecked
window.onload = function () {
  if (JSON.parse(localStorage.getItem('timer_toggle'))) {
    let timeSecond = localStorage.getItem("timeSecond") ? localStorage.getItem("timeSecond") : 2*60;
    if(JSON.parse(localStorage.getItem('resetTimer'))){
    timeSecond = 2*60;
    }
    displayTime(timeSecond)
    const countDown = setInterval(() => {
      timeSecond--;
      displayTime(timeSecond);
      localStorage.setItem("timeSecond", timeSecond);
      if (timeSecond <= 0 || timeSecond < 1) {
        endTime();
        clearInterval(countDown);
      }
    }, 1000)
  } else {
    localStorage.removeItem("timeSecond")
  }

}
