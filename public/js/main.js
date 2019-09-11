
 function copyURL(){
    var slug = document.getElementById('appID').value;
    var fullLink = document.createElement('input');
    document.body.appendChild(fullLink);
    fullLink.value = "http://feellucky.loc/pageA/" + slug;
    fullLink.select();
    document.execCommand("copy", false);
    fullLink.remove();
    alert("Copied the URL: " + fullLink.value);
}