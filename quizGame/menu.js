var demo = {};
demo.menu = function(){};
demo.menu.prototype = {
    preload: function(){
        
        game.load.image('ball', 'assets/blue_ball.png');
        
    },
    create: function(){
        
        science = game.add.button(game.world.centerX - 295, game.world.centerY - 295, 'ball', scienceClick, this, 2, 1, 0);
        
        english = game.add.button(game.world.centerX - 295, game.world.centerY - 295, 'ball', englishClick, this, 2, 1, 0);
        
        math = game.add.button(game.world.centerX - 295, game.world.centerY + 90, 'ball', mathClick, this, 2, 1, 0);
        
        hard1 = game.add.button(game.world.centerX - 295, game.world.centerY + 295, 'ball', hard1Click, this, 2, 1, 0);
    },
    update: function(){
        var style = {font: '22px Arial', fill: '#dabbed'};
        
        title = game.add.text(150, 0, "Select a Quiz to Begin", {font: '40px Arial', fill: '#dabbed'})
        
        science_label = game.add.text(20, -5," Science Quiz", style)
        science.fixedToCamera = true;
        science.cameraOffset.setTo (50, 120);
        science.addChild(science_label);
        
        math_label = game.add.text(20, -5, " Math Quiz", style)
        math.fixedToCamera = true;
        math.cameraOffset.setTo (50, 240);
        math.addChild(math_label);
        
        advMS_label = game.add.text(20, -5, " Adv. Math / Sci Quiz", style)
        hard1.fixedToCamera = true;
        hard1.cameraOffset.setTo (50, 360);
        hard1.addChild(advMS_label);
        
        english_label = game.add.text(20, -5, "English Quiz", style)
        english.fixedToCamera = true;
        english.cameraOffset.setTo (400, 120);
        english.addChild(english_label);
    }    
}
function scienceClick() {
    quiz = "../sciencequiz.txt" 
    dif = 1;
    game.state.start('gameQuiz') 
    
}

function englishClick() {
    quiz = "../englishquiz.txt" 
    dif = 1;
    game.state.start('gameQuiz') 
    
}

function mathClick() {
    quiz = "../mathquiz.txt" 
    dif = 3;
    game.state.start('gameQuiz')
    
}
function hard1Click() {
    quiz = "../advanmathsciquiz.txt"
    game.state.start('gameQuiz')
    
    
}

