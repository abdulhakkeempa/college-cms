import './bootstrap';

var invalidButton = document.getElementById("closebtn")
if (invalidButton){
    invalidButton.addEventListener("click", function() {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    });
}

var toggleButton = document.getElementById("window-toggle-sidebar-btn")
if (toggleButton){
    toggleButton.addEventListener('click',function() {
        var x = document.getElementsByTagName("BODY")[0];
        x.classList.toggle('toggle-sidebar')
    })
}


// $("#login-form").submit((e) => {
//     e.preventDefault()
//     console.log("Hi");
//     console.log($("#login-form").serialize())
//     $.ajax({
//         type: "POST",
//         url: '/login',
//         data: $("#login-form").serialize()
//     }).done(function (msg) {
//         alert(msg);
//     });
// })


$(".user-edit-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        data: id,
        url: "/users",
        type: "POST",
        dataType: 'json',
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});