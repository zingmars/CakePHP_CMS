//Prevent random crawlers from adding my email to their spam lists
//Also lets me modify my email without needing to modify the page.
function getEmail()
{
    var xmlhttp;
    if (window.XMLHttpRequest)  {
        xmlhttp=new XMLHttpRequest();
    }
    else  {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            alert(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET","splash/getEmail",true);
    xmlhttp.send(null);
}

//Displays a message instead of my twitter feed if it is blocked.
function adblockcheck()
{
    if (document.getElementsByClassName("fa-twitter-square")[0].offsetParent === null) { //adblock with social network blocklist will usually just hide the element. Check for that, and display the message if that's the case.
        document.getElementsByClassName("adblock")[0].style.display = 'initial';
    }
}