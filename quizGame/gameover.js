
demo.gameover = function(){};
demo.gameover.prototype = {
    create: function () {
        var gameoverLabel = stateText = game.add.text(500, 300, ' ', {font: '50px Arial', fill: '#FFF'});
        game.stage.backgroundColor = '#0E9200';

        var style = { font: "bold 32px Bungee", fill: "#fff", boundsAlignH: "center", boundsAlignV: "middle" };

        text = game.add.text(180, 120, "GAME OVER", { font: "bold 32px Bungee", fill: "#fff", boundsAlignH: "center", boundsAlignV: "middle" });
        text.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);
        
        FinalScoreText = game.add.text(140, 160, 'FINAL SCORE: ' + score, { font: "bold 32px Bungee", fill: "#fff", boundsAlignH: "center", boundsAlignV: "middle" });
        FinalScoreText.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);

        //  We'll set the bounds to be from x0, y100 and be 600px wide by 100px high
        //text.setTextBounds(0, 100, 600, 100);
        music.mute = true;
//        quiz = "../sciencequiz.txt"
//        quiz = "../englishquiz.txt"
//        quiz = "../mathquiz.txt"
//        quiz = "../advanmathsciquiz.txt"
        
        var xhr;
        if (window.ActiveXObject){
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if (window.XMLHttpRequest){
            xhr = new XMLHttpRequest();
        }
        
        if(score < 0){
            var score = 0;
        }
        if(quiz == "../sciencequiz.txt"){
            callServer("science", score);
        }
        else if(quiz == "../englishquiz.txt"){
            callServer("english", score);
        }
        else if(quiz == "../mathquiz.txt"){
            callServer("math", score);
        }
//        else if(quiz == "../advanmathsciquiz.txt"){
//            //callServer("advance math/science", score);
//            pass
//        }
    },
    update: function () {
    }
};

function callServer(subject, score){
    var subject = subject;
    var score = score;
    var username = document.getElementById('username').value;
    alert(username)
    var url = "https://www.cs.utexas.edu/~megashby/Software_Engineering/Project34/databaseincrementscore.php?username="+username+"&subject="+subject+"&subjectscore="+score;
    xhr.open('GET', url, true);
    xhr.onreadystatechange = updatePage;
    xhr.send(null);
}
function updatePage()
  {
    if ((xhr.readyState == 4) && (xhr.status == 200))
    {
      var response = xhr.responseText;
      var responsetext = 'Your new score in' +subject + 'is '
      window.alert(responsetext.concat(response));
    }
  }