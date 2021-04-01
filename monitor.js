let response = '';

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
    return response;
}
loadSQL();
document.write(response);