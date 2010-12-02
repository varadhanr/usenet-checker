var http_request = false;
function makeRequest(url, parameters) {
    http_request = false;
    if (window.XMLHttpRequest) {
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {}
        }
    }
    if (!http_request) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
    http_request.onreadystatechange = alertContents;
    http_request.open('GET', url + parameters, true);
    http_request.send(null);
}

function alertContents() {
    if (http_request.readyState == 4) {
        if (http_request.status == 200) {

            result = http_request.responseText;
            document.getElementById('result').innerHTML = result;

        } else {
            alert('There was a problem with the request.');
        }
    }
    else {
        document.getElementById('result').innerHTML = "<center><img src='images/loading.gif'></center>";
    }
}

function get(obj) {
    var getstr = "?";
    for (i = 0; i < document.forms[0].elements.length; i++) {
        getstr += document.forms[0].elements[i].name + "=" + document.forms[0].elements[i].value + "&";
    }
    makeRequest('check.php', getstr);
}
