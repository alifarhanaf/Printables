
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            .container{
                width: 100%;
                max-width: 500px;
                margin: auto;
            }
            .header{
                background: none;
                border: 1px solid #84a0bf;
                text-align: center;
                padding: 20px;
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
                    <h3 style="color: #84a0bf">New Campaign</h3>
                </div>
    
    
                <div class="message">
                    <p style="text-align: center;color: #84a0bf;"> Hi {{$user->name }}, Your new Campaign has been submitted. </p>
                    <hr>
    
                    <h3 style="text-align: center;margin-bottom: 0;color: #84a0bf;"> Campaign Details</h3>
                    <div id="mailsys" style="vertical-align: middle; padding-bottom:20%">
                        <div class="row " style="display: flex !important; height: 30px; ">
                            <h6>Campaign ID:</h6>
                            <h6 style="margin-inline-start: 50px">{{$campaign->id }} </h6>
                                </div>
                    <div class="row " style="display: flex !important;  height: 30px; ">
                <h6>Campaign:</h6>
                <h6 style="margin-inline-start: 50px">{{$campaign->name }} </h6>
                    </div>
                    <div class="row " style="display: flex !important;  height: 30px; ">
                        <h6>Product:</h6>
                        <h6 style="margin-inline-start: 50px">{{$campaign->products[0]->name }} </h6>
                            </div>
                            <div class="row " style="display: flex !important;  height: 30px; ">
                                <h6>Product Color:</h6>
                                <h6 style="margin-inline-start: 50px">{{$campaign->product_color }} </h6>
                                    </div>
                                    <div class="row " style="display: flex !important;  height: 30px; ">
                                        <h6>Date of Delivery:</h6>
                                        <h6 style="margin-inline-start: 50px">{{$campaign->deliveryDate }} </h6>
                                            </div>
                                            <div class="row " style="display: flex !important;  height: 30px; ">
                                                <h6>Delivery Address:</h6>
                                                <h6 style="margin-inline-start: 50px">{{$campaign->addresses[0]->firstName }}{{$campaign->addresses[0]->lastName }}
                                                    <br>{{$campaign->addresses[0]->addressLine1 }}{{$campaign->addresses[0]->addressLine2 }}
                                                    <br> {{$campaign->addresses[0]->city }} {{$campaign->addresses[0]->state }} {{$campaign->addresses[0]->country }} </h6>
                                                    </div>
                                                    
                                                            
                                            
                    </div >
    
            </div>
        </div>
        <div class="contaner_contaner">
            <div class="footer">
                <p>Geneologie 2020</p>
            </div>
        </div>
    </div>
    
    </body>
    </html>
    