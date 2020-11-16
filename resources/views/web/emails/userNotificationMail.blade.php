
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            .container{
                width: 100%;
                max-width: 500px;
                margin: auto;
                padding: 0px;
                border: 1px solid #84a0bf;
                background: #fafafa;
            }
            .header{
                background: none;
                border: 1px solid #84a0bf;
                text-align: center;
                padding: 20px;
                background-color: #fafafa;
                border-bottom: 2px solid #84a0bf; 
            }
            .container-body{
                padding: 20px 20px 0px 20px;
                background-color: #fafafa;
            }
            .footer{
                text-align: center;
                padding:20px ;
                background-color: #fafafa;
                color: darkgrey;
    
            }
            .title{
                font-family: Helvetica,Arial,sans-serif;
                text-align: center;
                color: black !important;
            }
            .message{
                font-size: 16px;
                line-height: 25px;
                font-family: Helvetica,Arial,sans-serif;
                color: #666666;
            }
            .action{
                display: inline-block;
                margin: auto;
                width: 100%;
                text-align: center;
            }
            .prd-button{
                padding: 15px 25px;
                display: block;
                font-size: 16px;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-family: Helvetica,Arial,sans-serif;
                font-weight: 500;
                background-color: #44ce96;
                color: #fff !important;
                text-decoration: none;
                border: 2px solid transparent;
                width: 50%;
                margin: auto;
            }
            .prd-button:hover {
                background-color: #fff;
                border: 2px solid #000;
                color: #000 !important;
            }
            .contaner_contaner {
                width: 100%;
            }
            #mailsys p{
                    color: #84a0bf;
            }
            #mailsys h6{
                color: #84a0bf;
            }
            .az{
                background: #84a0bf;
                background-color: #84a0bf;
                border-color: #84a0bf;
            }
            .btn-primary:hover {
            color: #fff;
            background-color: #84a0bf;
            border-color: #84a0bf;
            }
            .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
                color: #fff;
                background-color: #84a0bf;
                border-color: #84a0bf;
            }
            a{
                color: #fff;
                text-decoration: none;
                text-transform: uppercase;
            }               
            a:hover{
                color: #fff;
            } 
            a:active{
                color: #fff;
            }
            .az {
                padding: 10px 8px;
                border-radius: 5px;
                outline: none;
                border: none;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="contaner_contaner">
            <div class="header">
                <img src="http://127.0.0.1:8000/storage/images/home/logo.png" style="max-width: 94px">
            </div>
        </div>
    
        <div class="contaner_contaner">
            <div class="container-body">
                <div class="title">
                    <h3 style="color: #84a0bf;font-size:1.5rem;font-weight:600;">New Message Notification</h3>
                </div>
    
    
                <div class="message" style="text-align: center;">
                    <p style="color: #84a0bf;"> Hi Admin,  You've received a new message from {{$customer->name}}. </p>
                   
                    <button type="button" class="btn btn-primary az" >
                    <a href="{{ route('campaignScreenAdmin1',$campaign->id) }}" > Click Here to See</a>
                    </button
                    <hr style="margin-bottom: 0px">
    
                   
            </div>
        </div>
        <hr>
        <div class="contaner_contaner">
            <div class="footer">
                <p>Geneologie 2020</p>
            </div>
        </div>
    </div>
    
    </body>
    </html>
    