var CronJob = require('cron').CronJob;
var nodemailer = require('nodemailer');
const fs = require('fs');



  new CronJob('* * * * *', function () {  
 
    console.log('runs everday at 2PM',new date())
   semdEmail();
    
    })
 

 

function semdEmail(){
	console.log('came inside of email')
	 var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'homesgoods3@gmail.com',
    pass: 'N@veen@141'
  }
});

var mailOptions = {
  from: 'homesgoods3@gmail.com',
  to: 'naveencheekati2@gmail.com',
  subject: 'Sending Email using Node.js',
  text: 'That was easy!',
  attachments: [
    {
      filename:'demo.sql',
      content:fs.createReadStream('C:/xampp/htdocs/loginform/backup/demo_20210915.sql')
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