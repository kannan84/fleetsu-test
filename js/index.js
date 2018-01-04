$(document).on('pagebeforeshow', '#index', function(){ 
    ajax.ajaxCall("handler.php/devices", true);
});
 
$(document).on('click', '#user-list li', function(){ 
    ajax.ajaxCall("handler.php/devices/" + $(this).data('listid'), false);
});
 
var ajax = { 
    parseJSON:function(result){ 
        var obj = jQuery.parseJSON(result);
        $('#user-list').empty();        
        $.each(obj, function(key,row) {
            $('#user-list').append('<li data-listid="' + key + '"><a href="" data-id="' + row.id + '"><img src="assets/images/'+row.image+'"/><h3>' + row.id + '</h3><p>' + row.label + '</p><p>' + row.last_reported + '</p></a></li>');       
        });
        $('#user-list').listview('refresh');        
    },
    parseJSONDetails:function(result){ 
        var obj = jQuery.parseJSON(result);     
        $('#personal-data').empty();
        $('#personal-data').append('<li><img src="assets/images/'+obj.image+'"></li>');
        $('#personal-data').append('<li>Device ID: '+obj.id+'</li>');
        $('#personal-data').append('<li>Device Label: '+obj.label+'</li>');           
        $('#personal-data').append('<li>Reported at: '+obj.last_reported+'</li>');           
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
