<!DOCTYPE html>
<html>
    <head>
        <title>Telematics Devices</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=no; target-densityDpi=device-dpi"/>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" /> 
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>  
        <script src="js/jquery.loadTemplate.min.js"></script>  
        <script src="js/moment.min.js"></script>  
        <script src="js/moment-timezone.min.js"></script>  
        <link rel="stylesheet" href="css/style.css" />
        
    </head>
    <body>     
        <div data-role="page" id="index" data-theme="a" >
            <div data-role="header">
                <h3>
                    Devices List
                </h3>
            </div>
             
            <div data-role="content">
                <ul data-role="listview" id="user-list"  data-theme="a">
                    
                </ul>
            </div>
             <script id="devicesTemplate" type="text/html">
                        <li data-template-bind='[
        {"attribute": "data-listid", "value": "id"}]'>
                            <a href="" data-id="id">
                                <div class="status-icon"><img data-template-bind='[
        {"attribute": "class", "value": "status"}]' ></div>
                                <div class="device-details"><h3 data-content-append="id">Device ID: </h3>
                                <p data-content-append="label">Device Label: </p>
                                <p data-content-append = "last_reported">Last Reported: </p></div>
                                <div class='clear'></div>
                                <div class="device-details" >
                                    <div data-content-append="transaction.lat" data-binding-options='{"ignoreUndefined": true, "ignoreNull": true}'>Latitude: </div>                        
                                    <div data-content-append="transaction.lng" data-binding-options='{"ignoreUndefined": true, "ignoreNull": true}'>Longitude   : </div>
                                    <iframe data-src="mapSrc" data-binding-options='{"ignoreUndefined": true, "ignoreNull": true}'
                                          width="600"
                                          height="450" 
                                          frameborder="0" style="border:0" 
                                          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAxjxzwc8YFQBEhf30ollgP--KqCRwFqLE&q=transaction.lat, transaction.lng" allowfullscreen>
                                    </iframe>   
                                                            
                                </div>
                                
                            </a>
                        </li>

            </script>
          
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
        <script src="js/index.js"></script>      
    </body>
</html>