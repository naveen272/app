var express = require('express');
var nodemailer = require('nodemailer');
const fs = require('fs');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var app = express();
var moment = require('moment');
app.use(cookieParser());
app.use(bodyParser.json({ limit: '50mb', extended: true })); // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({ // to support URL-encoded bodies
  limit: '50mb', extended: true
}));

app.listen(3000, function (err) {
  if (err) {
    console.log(err);
  } else {
    console.log('HTTPS Server listening');
    function semdEmail(){
      console.log('came inside of email')
       var transporter = nodemailer.createTransport({
      service: 'gmail',
      auth: {
        user: 'homesgoods3@gmail.com',
        pass: '9030187439'
      }
    });
    
    var mailOptions = {
      from: 'homesgoods3@gmail.com',
      to: 'naveencheekati2@gmail.com',
      subject: 'Sending database backup file',
      text: 'Send mail',
    attachments: [
    {
      filename:'demo.sql',
      content:fs.createReadStream('/var/www/html/backups/demo_'+moment(new Date()).format('YYYYMMDD')+'.sql')
      //content:fs.createReadStream('C:/xampp/htdocs/loginform/mailer/demo_'+moment(new Date()).format('YYYYMMDD')+'.sql')
    }]
    };
    
    transporter.sendMail(mailOptions, function(error, info){
      if (error) {
        console.log(error);
      } else {
        console.log('Email sent: ' + info.response);
      }
    });
    }
    semdEmail()
  }
});
