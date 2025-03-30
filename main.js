let timer;
let minutes = 0;
let seconds = 3;
let isRunning = false;
let workSessionsCompleted = 0;

const timeDisplay = document.getElementById('timeDisplay');
const start = document.getElementById('start');
const pause = document.getElementById('pause');
const reset = document.getElementById('reset');
const alarmSound = document.getElementById("alarmSound");

let tasks = [];

function updateTime() {
    timeDisplay.textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}


// Function to play sound properly
function playSound() {
    alarmSound.play().catch(error => {
        console.error("Audio playback failed:", error);
    });
}

// Fonction pour démarrer ou reprendre le timer
function startTimer() {
    if (!isRunning) {

        // Stop the alarm sound if it's playing
        alarmSound.pause();
        alarmSound.currentTime = 0;

        timer = setInterval(countdown, 1000);
        isRunning = true;
    }
}

// Fonction pour mettre en pause le timer
function pauseTimer() {
    clearInterval(timer);
    isRunning = false;
}

// Fonction pour le compte à rebours
function countdown() {
    if (seconds === 0) {
        if (minutes === 0) {
            clearInterval(timer);
            isRunning = false;
            playSound();
            workSessionsCompleted++;
            if (workSessionsCompleted % 4 === 0) {
                startBreak(15);
            } else {
                startBreak(5);
            }
        } else {
            minutes--;
            seconds = 59;
        }
    } else {
        seconds--;
    }
    updateTime();
}

// Fonction pour gérer les pauses (courte ou longue)
function startBreak(breakMinutes) {
    minutes = breakMinutes;
    seconds = 0;
    updateTime();
    alert(`Pause de ${breakMinutes} minutes!`);
}

// Fonction pour réinitialiser le timer
function resetTimer() {
    clearInterval(timer);
    minutes = 0;
    seconds = 3;
    isRunning = false;
    workSessionsCompleted = 0;
    updateTime();
}

// Événements
start.addEventListener('click', startTimer);
pause.addEventListener('click', pauseTimer);
reset.addEventListener('click', resetTimer);

// Initialisation
updateTime();
