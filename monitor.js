function loadSQL() {
    let dataObj = {
    };
    $.ajax({
        type: 'POST',
        url: 'monitor.php',
        data: dataObj,
        success: function (result) {
            console.log(result);
            response = result;
        },
        error: function () {
            console.log('No Response');
            response = 'No Response';
        }
    }).done(function () {
    });
}

let response = '';
loadSQL();
document.getElementById("p1").innerHTML = response;