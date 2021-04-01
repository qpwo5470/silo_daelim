function loadSQL() {
    let dataObj = {
    };
    let response = '';
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
document.write(loadSQL())