let roundsElem = document.querySelector('.roundsElem');
let howManyRounds = 0;

// increment
function increment(){
    howManyRounds++;
    roundsElem.innerHTML = howManyRounds;
}
function decrement(){
    if (howManyRounds > 0) {
        howManyRounds--;
    }
    roundsElem.innerHTML = howManyRounds;
}
function numberGenerator(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

let dice1, dice2;
let score1 = 0;
let score2 = 0;
let rounds = 1;
let con = document.querySelector('.dice-con');
let img = document.createElement('img');
img.src = `images/dice-1.png`;
con.appendChild(img);

let player1Btn = document.getElementById('play1btn');
let player2Btn = document.getElementById('play2btn');
let score1elem = document.getElementById('score1');
let score2elem = document.getElementById('score2');
let resultElem = document.getElementById('result');
let restart = document.getElementById('restart');
let start = document.getElementById('start');
let toggles = document.querySelectorAll('.toggle');
let errorMessage = document.getElementById('errorMessage');

start.onclick = function(){
    if(howManyRounds == 0){
        errorMessage.innerHTML = "Zero is not valid";
    }else{
        toggle();
    }
 
}
restart.onclick = function() {
    if (confirm("Are you sure you want to restart the game?")) {
        startNewGame();
        toggle();
    }
    };

function toggle(){
    toggles.forEach(tog =>{
        tog.classList.toggle('active');
    });

}

resultElem.innerHTML = `Round ${rounds}`;
player1Btn.addEventListener("click", () => {
    dice1 = player1();
    img.src = `images/dice-${dice1}.png`;
    player1Btn.disabled = true;
    player2Btn.disabled = false;
});

player2Btn.addEventListener("click", () => {
    dice2 = player2();
    img.src = `images/dice-${dice2}.png`;
    player2Btn.disabled = true;
    player1Btn.disabled = false;
    winner(); // Check for the winner after Player 2 rolls
});
 
function winner() {
    if (howManyRounds == rounds) {
        checkScore();
        displayScore();
        setTimeout(()=>{
            if (score1 > score2) {
            resultElem.innerHTML = "Game over <br>Player 1 wins!";
            } else if(score1 < score2){
                resultElem.innerHTML = "Game over <br> Player 2 wins!";
            }else{
                resultElem.innerHTML = "Game over <br> It's a Tie!";
            }
        },3000)
       
        disableButtons();
    } else {
        if (dice1 !== undefined && dice2 !== undefined) {
          
            if (dice1 > dice2) {
                score1++;
                resultElem.innerHTML = `Player 1 win`;
                disableButtons()
                setTimeout(()=>{
                disabledButtonsFalse()
                resultElem.innerHTML = `Round ${rounds}`;
                
            }, 1000);
            
                
            } else if (dice1 < dice2) {
                score2++;
                resultElem.innerHTML = `Player 2 win`;
                disableButtons()
                setTimeout(() => {
                    disabledButtonsFalse()
                    resultElem.innerHTML = `Round ${rounds}`;
                
                }, 1000);
            
            } else {
                resultElem.innerHTML = `It's a Tie`;
                disableButtons()
                setTimeout(() => {
                    disabledButtonsFalse()
                    resultElem.innerHTML = `Round ${rounds}`;
                
                }, 1000);
            }
            rounds++;
            displayScore();
        }
    }
}
function checkScore(){
    if (dice1 > dice2) {
        score1++;
       
        disableButtons()
        setTimeout(()=>{
            resultElem.innerHTML = `Player 1 win`;
    }, 1000);
    
        
    } else if (dice1 < dice2) {
        score2++;
        
        disableButtons()
        setTimeout(() => {

            resultElem.innerHTML = `Player 2 win`;
        
        }, 1000);
    
    } else {
       
        disableButtons()
        setTimeout(() => {

            resultElem.innerHTML = `It's a Tie`;
        
        }, 1000);
    }
}
function player1() {
    return numberGenerator(1, 6);
}

function player2() {
    return numberGenerator(1, 6);
}

function displayScore() {
    score1elem.innerHTML = score1;
    score2elem.innerHTML = score2;
}

function disableButtons() {
    player1Btn.disabled = true;
    player2Btn.disabled = true;
}
function disabledButtonsFalse(){
    player1Btn.disabled = false;
    player2Btn.disabled = false;
}

function  startNewGame(){
    rounds = 1;
    score1 =  0;
    score2 = 0;
    resultElem.innerHTML = `Round ${rounds}`;
    displayScore();
    disabledButtonsFalse();
    howManyRounds = 0;
    roundsElem.innerHTML = howManyRounds;
    player2Btn.disabled = true;

}
console.log("script loaded");
