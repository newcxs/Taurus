window.onload = function(){
    var nav = document.getElementsByTagName('nav')[0];
    var ul = nav.getElementsByTagName('ul');
    for(var i=0; i<ul.length; i++){
        var li = ul[i].getElementsByTagName('li');
        for(var j=0; j<li.length; j++){
            var url = location.href;
            var uri = li[j].getElementsByTagName('a')[0].href;
            if(url == uri) li[j].className = 'active';
        }
    }
}
