function doMulti(messages) {
    document.getElementById('status').innerHTML = '<img src="images/loading.gif" alt="" />';

    var req = null;
    try {
        req = new XMLHttpRequest();
    }
    catch(ms) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(nonms) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(failed) {
                req = null;
            }
        }
    }

    if (req == null) alert("Error creating request object!");
    req.open("GET", 'check.php' + messages, true);
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            if (req.status == 200) {
                document.getElementById("result").innerHTML += req.responseText;
		document.getElementById("result").innerHTML += "<br />";
		document.getElementById('status').innerHTML = "";
            } else {}
        } else {}
    };
    req.send(null);
}

function getMulti() {
    maxlength = 500;
    if (document.getElementById("text").value.length >= maxlength) {
        alert('Your comments must be 500 characters or less');
        document.getElementById("text").focus();

    } else {
        document.getElementById("result").innerHTML = "";
        var myTa = document.getElementById("text").value;
        var taRows = myTa.split("\n");
        if (taRows.length > 10) {
            alert("Mehr als 10 Accounts geht nicht, sry!");
        } else {
            for (i = 0; i < taRows.length; i++) {
                var x = taRows[i].split(":");
                if (typeof x[1] != 'undefined') {
                    if (x[0] != "") {
                        var getstr = "?acc" + "=" + x[0] + "&pwd=" + x[1];
                        doMulti(getstr);
                    }
                }
            }
        }
    }
}
