<!DOCTYPE html>
<html>
    <head>
        <title>Silex Demo</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=no; target-densityDpi=device-dpi"/>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" /> 
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>    
        <script src="js/index.js"></script>     
    </head>
    <body>     
        <div data-role="page" id="index" data-theme="a" >
            <div data-role="header">
                <h3>
                    Devices List
                </h3>
            </div>
             
            <div data-role="content">
                <ul data-role="listview" id="user-list">
 
                </ul>
            </div>
             
            <div data-role="footer" data-position="fixed">
                 
            </div>
        </div> 
        <div data-role="page" id="second" data-theme="a" >
            <div data-role="header">
                <h3>
                    Device Detail
                </h3>
                <a href="#index" class="ui-btn-left">Back</a>
            </div>
             
            <div data-role="content">
                <ul data-role="listview" id="personal-data" data-theme="a">
  
                </ul>
            </div>
             
            <div data-role="footer" data-position="fixed">
                 
            </div>
        </div>  
    </body>
</html>