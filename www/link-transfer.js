// all links to documentation will be linked to local server
function linkTransfer(e) {
    var e = window.e || e;

    if (e.target.tagName !== 'A')
        return;

    var re = /^\/([\w]+)\/([\w\.\/\-]+)([#\w\-]*)$/;
    var m;
    if ((m = re.exec(e.target.getAttribute('href'))) !== null) {
        e.preventDefault();
        window.open(window.location.protocol + "//" + window.location.host + window.location.pathname
            + "?lang=" + m[1] + "&file=" + m[2] + m[3], "_self");
    }
}

if (document.addEventListener)
    document.addEventListener('click', linkTransfer, false);
else
    document.attachEvent('onclick', linkTransfer);