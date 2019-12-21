var path = window.location.pathname;
var host = window.location.hostname;

$(function(){

    // hashchange plugin
    $(window).hashchange(function(){
        var hash = $.param.fragment();
        if(hash.search('GET') == 0){
            if(path.search('User') > 0){
                get_konsumen()
            }
        }
    })

    get_konsumen()

    $(window).trigger('hashchange');
});

function get_konsumen(){
    if($('#user-list').length > 0){
        $.ajax('http://'+host+path+'/action/GET',{
            type:'GET',
            contentType :'application/json',
            dataType :'json',
            success:function(response){
                console.log(response)
            }
        })
    }
}