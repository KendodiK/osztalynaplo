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
                        "<table> <thead>" +
                        "<tr class='class-table-head'>" +
                        "<th>Név</th>" +
                        "<th>Szept.</th>" +
                        "<th>Okt.</th>" +
                        "<th>Nov.</th>" +
                        "<th>Dec.</th>" +
                        "<th>Jan.</th>" +
                        "<th>Febr.</th>" +
                        "<th>Márc.</th>" +
                        "<th>Ápr.</th>" +
                        "<th>Máj.</th>" +
                        "<th>Jun.</th>" +
                        "</tr></thead> <tbody>";

                    var cls = 'odd';
                    var last = ' ';
                    var id = 0;
                    for (var i = 0; i < len; i++) {
                        if (response[i].name != last) {
                            last = response[i].name;
                            if (i % 2 === 0) {
                                cls = 'even-tr';
                            } else {
                                cls = 'odd-tr';
                            }
                            toHtml += "<tr class='" + cls + " stud-" + i + "' id='" + id + "'>" +
                                "<td>" + response[i].name + "</td>" +
                                "<td class='month1' id='month1'></td>" +
                                "<td class='month2' id='month2'></td>" +
                                "<td class='month3' id='month3'></td>" +
                                "<td class='month4' id='month4'></td>" +
                                "<td class='month5' id='month5'></td>" +
                                "<td class='month6' id='month6'></td>" +
                                "<td class='month7' id='month7'></td>" +
                                "<td class='month8' id='month8'></td>" +
                                "<td class='month9' id='month9'></td>" +
                                "<td class='month10' id='month10'></td>" +
                                "</tr>"
                            id++;
                        }
                    }
                    toHtml += "</tbody> </talbe>"
                    $('#teacherContent').html(toHtml);

                    for(var i = 0; i < len; i++){
                        createClassTable(i, response[i].mark, response[i].given_at);
                    }
                }
            }
        })
    })

    function createClassTable(studentPlace, mark, given_at){
        var given = given_at.substring(5,7);
        if(given[0] == '0'){
            given = given[1];
        }
        var monthClass = ['month1', 'month2', 'month3', 'month4', 'month5', 'month6', 'month7', 'month8', 'month9', 'month10']
        var month = ['9', '10', '11', '12', '1', '2', '3', '4', '5', '6']
        for(var i = 0; i < month.length; i++) {
            if(month[i] == given){
                $("#"+studentPlace+" #"+monthClass[i]).html(mark);
            }
        }
    }
})
