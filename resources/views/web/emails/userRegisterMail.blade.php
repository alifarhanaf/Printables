{{-- 
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
    <body onload="changeScreenSize()">
    <div class="container">
        <div class="contaner_contaner">
            <div class="header">
                <img src="http://127.0.0.1:8000/storage/images/home/logo.png" style="max-width: 94px">
            </div>
        </div>
    
        <div class="contaner_contaner">
            <div class="container-body">
                <div class="title">
                    <h3 style="color: #84a0bf">Registration Successfull</h3>
                </div>
    
    
                <div class="message">
                    <p style="text-align: center;color: #84a0bf;"> Hi {{$user->name }}, Your are now part of Geneologie Family. </p>
                    <hr style="margin-bottom: 0px">
    
                   
            </div>
        </div>
        <div class="contaner_contaner">
            <div class="footer">
                <p>Geneologie 2020</p>
            </div>
        </div>
    </div>
    
    </body>
    <script type="text/javascript">

        function changeScreenSize() {        
            window.resizeTo(screen.width-300,screen.height-500)   
        }
    </script>
    </html>

     --}}


     
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>JavaScript Window Resize Event</title>
</head>
<body>
<div id="result"></div>
<script>
// Defining event listener function
function displayWindowSize(){
    // Get width and height of the window excluding scrollbars
    var w = document.documentElement.clientWidth;
    var h = document.documentElement.clientHeight;
    // Display result inside a div element
    document.getElementById("result").innerHTML = "Width: " + w + ", " + "Height: " + h;
}
// Attaching the event listener function to window's resize event
window.addEventListener("resize", displayWindowSize);
// Calling the function for the first time
displayWindowSize();
</script>
<p><strong>Note:</strong> Please resize the browser window to see how it works.</p>
</body>
</html>