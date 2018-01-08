$(document).on('pagebeforeshow', '#index', function(){ 
    ajax.ajaxCall("handler.php/devices", true);
});
 
$(document).on('click', '#user-list li', function(){ 
    ajax.ajaxCall("handler.php/devices/" + $(this).data('listid'), false);
});
 
var ajax = { 
    parseJSON:function(result){ 
        var obj = jQuery.parseJSON(result);
        $.each(obj,function(index,value){ 
            moment.tz.setDefault("Etc/UTC");
            var date = new Date(value.last_reported);
            var userTz = moment.tz.guess(); 
            if (userTz != undefined) {
                var temp = '';
               temp = moment(value.last_reported);
               obj[index].last_reported=temp.tz(userTz).format();
            } else {
               obj[index].last_reported =  date.toString();
            }
        }); 
        $("#user-list").loadTemplate("#devicesTemplate",obj,{error: function(e) { console.log(e); }});
        
        $('#user-list').listview('refresh');        
    },
    parseJSONDetails:function(result){ 
        var obj = jQuery.parseJSON(result);
        moment.tz.setDefault("Etc/UTC");
        var date = new Date(obj.last_reported);
        var userTz = moment.tz.guess(); 
        if (userTz != undefined) {
            var temp = '';
           temp = moment(obj.last_reported);
           obj.last_reported=temp.tz(userTz).format();
        } else {
           obj.last_reported =  date.toString();
        }
      
        $('#personal-data').empty();
        $("#personal-data").loadTemplate("#devicesTemplate",obj,{error: function(e) { console.log(e); }});
        //$("#personal-data").loadTemplate("#transactionTemplate",obj,{error: function(e) { console.log(e); }});
        $('#personal-data').listview().listview('refresh'); 
        $.mobile.changePage( "#second");
    },
    ajaxCall: function(url, initialize) {
        $.ajax({
            url: url,
            async: 'true',
            success: function(result) {
                if (initialize) {
                    ajax.parseJSON(result);
                } else {
                    ajax.parseJSONDetails(result);
                }
            },
            error: function(request, error) {
                alert('Network error has occurred, please try again!');
            }
        });
    }
}