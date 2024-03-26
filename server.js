//WARNING!!! SERVER DOES NOT WORK WITH PHP...

const express = require('express');

const hostname = '127.0.0.1';
const port = 8088;
const path = require("path");
const server = express();
const exec = require('child_process');

server.use(express.static(path.join(__dirname,'public')));

server.get('/', (req, res) => {
   res.sendFile(path.join(__dirname, 'public/home','home.html'));
});

server.get('/', (req, res) => {
    exec ('php login.php', function(err, stdout, stderr) {
        if (err) {
          console.error(err);
          return res.status(500).send('Error running PHP script');
        }
        res.send(stdout);
    });
});

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});

//WARNING!!! SERVER DOES NOT WORK WITH PHP...
//Testing only -- node server.js

