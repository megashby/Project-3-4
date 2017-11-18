const path = require('path');

const express = require('express');

let port = parseInt(process.argv[2]) || 8080;
// $npm start -- (any number (5678))
  //ex $ npm start -- 8080

console.log(`hosting a webserver on http://localhost:${port}`);

let app = express();

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'homepage.html'));
});

app.use(express.static(__dirname));

app.listen(port);
