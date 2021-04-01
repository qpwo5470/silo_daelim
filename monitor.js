function sleep(ms) {
    return new Promise((r) => setTimeout(r, ms))
}

function loadSQL() {
    let dataObj = {};
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

function write() {
    loadSQL();
    document.getElementById("p1").innerHTML = response;
}

async function loop() {
    while (true) {
        await sleep(3000);
        write();
    }
}

loop();