$(document).ready(function () {
    $('button[name="groupBtn"]').on('click', function () {
        var groupId = $(this).val();
        var subjectId = $(this).attr('data-value');

        $.ajax({
            url: '/groups/' + groupId + "/" + subjectId + "/all",
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = 0;
                if (response != null) {
                    len = response.length;
                }

                if(len > 0){
                    var toHtml =
                        "<ul>" +
                        "<li>" +
                        "<div>Név</div>" +
                        "<div>Szept.</div>" +
                        "<div>Okt.</div>" +
                        "<div>Nov.</div>" +
                        "<div>Dec.</div>" +
                        "<div>Jan.</div>" +
                        "<div>Febr.</div>" +
                        "<div>Márc.</div>" +
                        "<div>Ápr.</div>" +
                        "<div>Máj.</div>" +
                        "<div>Jun.</div>" +
                        "</li>";

                    for (var i = 0; i < len; i++){
                        toHtml += "<li><div>" + response[i].name + "</div><div id='classTableR-" + i + "' class='ClassTableR'></div></li>"
                    }
                    toHtml += "</ul>"
                    $('#teacherContent').html(toHtml);
                    createClassTable(response);
                }
            }
        })
    })

    function createClassTable(data){
        for(var i = 0; i < data.length; i++){
            var row;
            for(var j = 0; j < 10; j++){
                row += "<div></div>"
            }
            var id = "#classTableR" + i
            $(id).html(row);
        }
    }
})
