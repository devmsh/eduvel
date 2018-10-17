
var app = require('express')();
var server = require('http').Server(app);

var io = require('socket.io')(server);

var redis = require('ioredis');


server.listen('3000');

io.on('connection', function(socket){
    console.log('new client connected');
    var redisClient = redis.createClient();
    redisClient.subscribe('message');
    redisClient.on('message',   function(channel , message ){
            // console.log('new Notification in database' , channel , message);
            
            message = JSON.parse(message);
            
            
            
            socket.emit(channel,message)
            
           
            // console.log(channel, message);
        });
    });


    
    


