function loadSQL() {
    var dataObj = {
        category: 0
    };
    $.ajax({
        type: 'POST',
        url: 'phps/loadSQL.php',
        data: dataObj,
        success: function (result) {
            console.log(result);
        },
        error: function () {
            console.log('No Response');
        }
    }).done(function () {
    });
}

loadSQL();