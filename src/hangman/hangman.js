  
  $('button').on('click', handleClick);

  var hangman = {};

  function handleClick(e) {
    if (hangman.newGame || e.target.id === 'newGame') {
      if (e.target.id === 'newGame') {
        initialize();
        getWord();
      } else if (e.target.className.includes('letter')) {
        processGuess(e.target.id);
        checkForWin();
      } else {
        getHint(hangman.word, hangman.hintsUsed);
        hangman.hintsUsed += 1; 
      }
    } else {
      $('#newGame').effect('bounce');
    }
}

  function initialize() {
    let new_hangman = {
      newGame: true,
      answer: [],
      word: '',
      category: '',
      stickIndex: 0,
      hintsUsed: 0,
      stickFigure: [
        'hangman-head', 'hangman-body', 
        'hangman-leftArm', 'hangman-rightArm', 
        'hangman-leftLeg', 'hangman-rightLeg'
      ]
    };
    $('.guessed-right').text('');
    $('#word-letters').empty();
    $('svg > circle, line').removeClass().addClass('hide-hangman');
    $('#category-label').removeClass().addClass('badge badge-pill badge-secondary text-body');
    $('#hintText').text('');
    $('#hint').removeClass('disableClick');
    $('.letter').removeClass().addClass('btn btn-primary letter m-1');
    return hangman = new_hangman;
  }

  function getWord() {
    fetch("https://spotless-fridge.glitch.me/word")
      .then(res => res.json())
      .then(data => appendSpaces(data))
  }

  function appendSpaces(game) {
    hangman.word = game.word;
    hangman.category = game.category;
    hangman.answer = game.word.split('');
    
    $('#category-label').text(`Category: ${game.category}`);
    
    hangman.answer.forEach((el,i) => {
      let letterSpan = `<span id=${el.toLowerCase() + i} class="hide-letter">${hangman.answer[i]}</span>`;
      let punctSpan = `<span id="${el.toLowerCase() + i}" class="show-letter punct">${hangman.answer[i]}</span>`;
      let letterSpace = `<div class="col-sm-1 mx-1 guessed-right">${letterSpan}</div>`;
      let punctSpace = `<div class="col-sm-1 mx-1 guessed-right">${punctSpan}</div>`;
      
      if (el === ' ') {
        $('#word-letters').append(`&emsp;`);
      } else if (el === ':' || el === '-') {
        $('#word-letters').append(punctSpace);
      } else {
        $('#word-letters').append(letterSpace);
      }
    });
  }

  function processGuess(id) {
    let guessLetter = $('#' + id);
    
    guessLetter.removeClass();
    guessLetter.addClass('btn btn-secondary letter m-1 disableClick');
    
    (hangman.word.includes(id)) ? showLetter(id) : addToHangman();
  }

  function showLetter(id) {
    let showLetters = hangman.answer.map((el,i) => el === id ? i : '').filter(x => x !== '');
    
    showLetters.forEach((el,i) => {
      $('#' + id.toLowerCase() + el).removeClass().addClass('show-letter');
    });
  }

  function addToHangman() {
    let lastIncorrect = hangman.stickIndex === hangman.stickFigure.length - 1;
    
    let stickPart = hangman.stickFigure[hangman.stickIndex];
    $('#' + stickPart).removeClass('hide-hangman');
    
    if (lastIncorrect) {
      gameOver();
    }
    
    hangman.stickIndex += 1;
  }

  function getHint(word, num) {
    if (hangman.hintsUsed > 2) {
      $('#hintText').text('No more hints...');
    } else {
      fetch(`https://spotless-fridge.glitch.me/hint/${word}/${num}`)
        .then(res => res.json())
        .then(data => showHint(data))
    }
  }

  function showHint(hint) {
    $('#hintText').text(`${hangman.hintsUsed}/3 - ${hint}`);
  }

  function checkForWin() {
    let playerWon = $('#word-letters').children().children().hasClass('hide-letter') === false;
    if (playerWon) {
      gameOver('win');
    }
  }

  function gameOver(result) {
    $('#hint').addClass('disableClick');
    $('.letter').addClass('disableClick');
    $('.hide-letter').removeClass().addClass('show-letter');
    
    let mssg = $('#category-label');
    
    let win = '<span>You Win!</span>';
    let lose = '<span>You Lost!</span>';
    
    mssg.empty();
    
    if (result === 'win') {
      mssg.removeClass('badge-secondary').addClass('badge-success');
      mssg.append(win);
    } else {
      mssg.removeClass('badge-secondary').addClass('badge-danger');
      mssg.append(lose);
    }
  }
