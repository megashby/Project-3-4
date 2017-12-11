var game = new Phaser.Game(1200, 700, Phaser.AUTO, 'quizGame');
game.state.add('menu', demo.menu);
game.state.add('gameQuiz', demo.gameQuiz);
game.state.add('gameover', demo.gameover);
game.state.start('menu')