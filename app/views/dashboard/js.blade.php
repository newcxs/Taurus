<script>
var nav = document.getElementById('tabs');
var li = nav.getElementsByTagName('li');
for(var i=0; i<li.length; i++){
    var url = location.href;
    var uri = li[i].getElementsByTagName('a')[0].href;
    if(url == uri) li[i].className = 'active';
}
</script>
