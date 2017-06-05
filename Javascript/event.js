document.addEventListener('change', function (event) {
    event = event || window.event;
    if (event.target.className == "editType") {
        var idevent = event.target.getAttribute('id');
        var valevent = document.getElementById(idevent).value;
        document.getElementById(idevent.substring(0, idevent.indexOf("stype")) + "type").innerHTML = valevent;
    }
    if (event.target.className == "editCategory") {
        var idevent = event.target.getAttribute('id');
        var valevent = document.getElementById(idevent).value;
        document.getElementById(idevent.substring(0, idevent.indexOf("scat")) + "cat").innerHTML = valevent;
    }

});