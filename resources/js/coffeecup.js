const startingMinutes = 25;
let time = startingMinutes * 60;

const baseTimerEL = document.getElementById('basetimer');
const startBtn = document.getElementById('startbtn');
const cup = document.getElementById('coffee-cup'); 


let countdown;

function updateCountdown(){
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;
    baseTimerEL.innerHTML = `${minutes}:${seconds}`;

    if (time > 0) {
        time--;
    } else {
        clearInterval(countdown);
        baseTimerEL.innerHTML = "Time's up! Take a break!";
    }
}
function startCountdown() {
    if (!countdown) { 
        countdown = setInterval(updateCountdown, 1000);
        console.log("Countdown started");
        cup.classList.add('empty');
    }
}
function pauseCountdown(){
    console.log('pause');
    if (countdown) {
        clearInterval(timerId);
        timerId = null;
    }
}

startBtn.addEventListener('click', startCountdown); 
pauseBtn.addEventListener('click', pauseCountdown); 