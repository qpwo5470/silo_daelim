function loadSQL() {
    var dataObj = {
        category: 0
    };
    $.ajax({
        type: 'POST',
        url: 'monitor.php',
        data: dataObj,
        success: function (result) {
            console.log(result);
            return result
        },
        error: function () {
            console.log('No Response');
            return 'No Response';
        }
    }).done(function () {
    });
}
document.write(loadSQL())