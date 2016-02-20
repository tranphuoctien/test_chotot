# test_chotot
Test of Chotot.vn
How to setup:
 - Edit /application/config/config.php on line 26(ex:chotot.local).
 - cd to NODE folder and run cmd install "npm install".
 - Edit file server.js on line 34 (Change same base_url CI ex:chotot.local).
 - Run nodejs "node server.js".

Some thing about my test.

    + Fontend I using AngularJs,PHP.
    + Backend Nodejs,PHP(curl & preg match).
    + PHP(CI) to using Curl after that preg match html to get all images from chotot.vn, i will not get picture if ads not thumbnail.
    + I include some libary as AngularJs,Bootstrap,SocketIO,Jquery in view of CI.
    + After 3 min,the result will update.Some images will change. I use socket to emit event 3 min for all client visit.
    + In Nodejs I save all result to "localStorage" if have any visitor i will respone,it's make sure all visitor see the same thing.
My test only that.. I'm not strong animation of CSS3 so sorry!

Thank you for all, I like you company! I hope that i can pass. so sad cause css3.
