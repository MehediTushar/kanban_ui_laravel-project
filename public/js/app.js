function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

/*$("#submit").click(function(event) {
    event.preventDefault();
    var data = $("#submit").serialize();
    $.ajax({
        type: "post",
        url: "{{ url('http://127.0.0.1:8000/api/addstatus) }}",
        data: { data: status },
        success: function(data) {
            // Android.passParams('dashboard');
        },
        error: function(data) {
            // Android.passParams(url);
        }
    });
});*/