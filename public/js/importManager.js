function importManager() {

    $('#submit').click(() => {

        try {
            var json = JSON.parse($('#input_json').val());
        } catch (Error) {
            alert('Invalid JSON');
            return;
        }

        var endpoint = $('#endpoint').val();

        var url = "/icingaweb2/director/" + endpoint;

        importConfigs(json, 0);

    });

}

function importConfigs(json, index) {

    var endpoint = $('#endpoint').val();

    var url = "/icingaweb2/director/" + endpoint;

    $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'Accept': 'application/json'
        },
        data: JSON.stringify(json[index]),
        success: function () {
            if (index < Object.keys(json).length - 1) {
                importConfigs(json, index += 1);
            } else {
                done(index);
            }
        },
        error: function (data) {
            console.log(data);

            if (!data.responseJSON['message']) {
                alert('Importing Config Unsuccessful, director responded with blank error message, either the template does not exist or the defined object_name already exists');
            } else {
                alert('Importing Config  Unsuccessful:\n\n' + data.responseJSON['message']);
            }
        }
    });

}

function done(numConfigsImported) {
    alert('Successfully Imported ' + numConfigsImported + ' Configs')
}