/**
 * Created by teenmaz on 20/2/2016.
 */
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var request = require('request');
if (typeof localStorage === "undefined" || localStorage === null) {
    var LocalStorage = require('node-localstorage').LocalStorage;
    localStorage = new LocalStorage('./database');
}
app.use(function (req, res, next) {
    // Website allow to connect
    res.setHeader('Access-Control-Allow-Origin','*');
    // Request methods to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
    // Request headers to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type, Authorization');
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);
    // Pass to next layer of middleware
    next();
});

app.get('/', function(req, res){
    res.send('SERVER NODEJS');
});
app.get('/getResult',function(req,res,next){
    res.send(localStorage.getItem('test'));
    res.end();
});

var requestOtherSite = function(){
    request('http://chotot.local/index.php/chotot/getResult', function (error, response, body) {
        if (!error && response.statusCode == 200) {
            localStorage.setItem('test',body);
            io.emit('getReresh','1111');
        }
    });
};
setInterval(function(){
    requestOtherSite();
},180000); // 3min
io.on('connection', function(socket){
    if(localStorage.getItem('test')===null){
        requestOtherSite();
    }
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
});
http.listen(3000, function(){
    console.log('listening on *:3000');
});