$(document).ready(function () {
    var e = document.getElementById("destination1");
    var destination1 = e.options[e.selectedIndex].value;
    var date = $("#date").val();

    var airlineCompanysCheckbox = document.querySelectorAll(".airline");
    $(airlineCompanysCheckbox).on("change", function () {
        var checked = [];
        for (let index = 0; index < airlineCompanysCheckbox.length; index++) {
            if (airlineCompanysCheckbox[index].checked) {
                checked.push(parseInt(airlineCompanysCheckbox[index].value));
                console.log(checked);
            }
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/explore/filter",
            dataType: "json",
            data: {
                destination1: destination1,
                date: date,
                checked: checked,
            },
            success: function (response) {
                console.log(response);
            },
            error: function (error, errmsg) {
                console.log(errmsg);
            },
        });
    });

    console.log(destination1, date);
});
