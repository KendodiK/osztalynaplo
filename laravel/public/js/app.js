$('#groupBtn').click(function () {
    var id = $(this).val();

    $.ajax({
        url: '/groups/' + id + "/all",
        type: 'get',
        dataType: 'json',
        success: function (response) {
            var len = 0;
            $('teacherContent').clear;

            if(response != null){
                len = response['data'].length;
                $('teacherContent').append(
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
                    "</li>"
                )
            }
        }
    })
})
