//initiate variables
const player = {X:'x', O:'o'};
const wins = [
    [0,1,2],
    [3,4,5],
    [6,7,8],
    [0,3,6],
    [1,4,7],
    [2,5,8],
    [0,4,8],
    [2,4,6]
];
let score = {X:0, O:0};
let currentPlayer = player.X;
let buttons = document.querySelectorAll('.box-space');
let available = [0,0,0,0,0,0,0,0,0];
let moves = 0;


//Prepare each box to receive moves
buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        if (available[index] == 0){
            moves += 1;
            if (currentPlayer === player.X) {
                button.innerHTML = 'X';
                available[index] = currentPlayer;
                checkWinner(currentPlayer);
                currentPlayer = player.O;
            }else {
                button.innerHTML = 'O';
                available[index] = currentPlayer;
                checkWinner(currentPlayer);           
                currentPlayer = player.X;
            }
            checkWinner(currentPlayer);
            if (moves >= 9) {
                alert('GAME OVER!\nTry Again')
                refresh();
            }
        }
        
    })
})

//
function display() {
    document.querySelector('.display').innerHTML = `<p>Scores:</p><p>X = ${score.X}</p><p>O = ${score.O}</p>`;
}

//function to check for winner
function checkWinner(player) {
    wins.forEach(win => {
        if (available[win[0]] == player && available[win[1]] == player && available[win[2]] == player) {
            alert(`${currentPlayer} Wins!`)
            currentPlayer == 'x' ? score.X += 1 : score.O +=1
            refresh(); 
        }
    })
    return false
}

//function to refresh board
function refresh() {
    currentPlayer = player.X;
    available = [0,0,0,0,0,0,0,0,0];
    moves = 0;
    buttons.forEach((button) => {button.innerHTML = ''});
    display();

}

//Delete scores
function replay() {
    score.O = 0;
    score.X = 0;
    refresh();
}
display();  