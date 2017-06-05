function getAjaxRequest(adress, params, check, callback) {
    xmlhttp.open('POST', adress, true);
    if (check == true) {
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                callback(xmlhttp.responseText);
            }
        }
    }

    xmlhttp.send(params);
}
/*Создаем объект для работы аснхронными запросами*/
function getXmlHttp() {

    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

var xmlhttp = getXmlHttp();
// Отлавливаем нажатие клавиш и обрабатываем ответы сервера 
document.addEventListener('click', function (event) {
    event = event || window.event;
    if (event.target.getAttribute("id") == "submit") {
        var myForm = document.getElementById("addForm");
        var adress = "/uran/newproduct";
        var form = new FormData(myForm);
        getAjaxRequest(adress, form, false, function (response) {
            myForm.reset();
        });
    }
    if (event.target.className == "butEdit") {
        var id = event.target.getAttribute("id");
        var val = id.substring(0, id.indexOf('ed'));
        var type = document.getElementById(val + "type").innerHTML;
        var category = document.getElementById(val + "cat").innerHTML;
        var description = document.getElementById(val + "des").value;

        var name = document.getElementById(val + "n").value;
        var adress = "/uran/edproduct";
        var params = "type=" + type + "&category=" + category + "&description=" + description + "&name=" + name + "&id=" + val;
        getAjaxRequest(adress, params, true, function (response) {
            alert(response);

        });
    }
    if (event.target.className == "remEdit") {
        var id = event.target.getAttribute("id");
        var val = id.substring(0, id.indexOf('rem'));
        var adress = "/uran/delete";
        var params = "id=" + val;
        getAjaxRequest(adress, params, true, function (response) {
            if (response == true) {
                var index = document.getElementById(id).parentNode.parentElement.rowIndex;
                document.getElementById("tableEdit").deleteRow(index);
                if (document.getElementById("tableEdit").getElementsByTagName('tr').length < 2) {
                    document.getElementById("tableEdit").style.display = "none";
                }
            }
        });
    }
});
window.onload = function () {
    var search = document.getElementById("search");
    search.oninput = function () {
        var result = search.value;
        var adress = "uran/sproduct";
        var params = "search=" + result;
        getAjaxRequest(adress, params, true, function (response) {
            var block = document.getElementById("ulresearch");
            block.innerHTML = response;
        });
    }
    if (document.getElementById("tableEdit").getElementsByTagName('tr').length < 2) {
        document.getElementById("tableEdit").style.display = "none";
    }

}