var questions = Array();
var choices = new Array();
var answers = Array();


    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", "./example.txt", false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
                {
                var allText = rawFile.responseText;
                // alert(allText)
                var lines = allText.split('\n');

                for (var i = 0; i < lines.length; i++){
                    // alert(lines[i])
                }
                //alert(lines)
            }
        }

    for (var questionNum = 0; questionNum <6; questionNum++){
        questions[questionNum] = lines[5*questionNum];
        //alert(questions[questionNum])

        choices[questionNum] = new Array();
        choices[questionNum][0] = lines[5*questionNum+1];
        choices[questionNum][1] = lines[5*questionNum+2];
        choices[questionNum][2] = lines[5*questionNum+3];

        // alert(choices[questionNum][0])
        // alert(choices[questionNum][1])
        // alert(choices[questionNum][2])

        answers[questionNum] = lines[5*questionNum+4]
        //alert(answers[questionNum])
    }

    }


   rawFile.send(null);



// myanswers[0] = lines[1];
// myanswers[1] = lines[2];
// myanswers[2] = lines[3];

// alert(myanswers[0])

// for (var key in myanswers){
//     var value = myanswers[key];
//     alert(value)
// }