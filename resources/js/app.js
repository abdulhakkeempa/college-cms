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
        url: "/users/"+id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            var data = JSON.parse(data);
            $('#jsonModal').modal('show');
            var upd_form = document.getElementById("user_update_form")
            upd_form.setAttribute("action", "/users/"+id);
            upd_form.user_name.value = data.name
            upd_form.designation.value = data.designation
            upd_form.joined_year.value = data.joined_year
            upd_form.iqac.value = data.iqac
            upd_form.user_email.value = data.email
            upd_form.portfolio.value = data.portfolio
            upd_form.phone_number.value = data.phone_number
            upd_form.address.value = data.address  
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});


$(".user-dlt-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        url: "/users/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            window.location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$(".course-dlt-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        url: "/courses/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            window.location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$(".course-edit-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        url: "/courses/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            var data = JSON.parse(data);
            $('#courseEditModal').modal('show');
            var upd_form = document.getElementById("courseEditForm")
            upd_form.setAttribute("action", "/courses/" + id);
            upd_form.course_name.value = data.course_name
            upd_form.eligibility.value = data.eligibility
            upd_form.course_description.value = data.course_description
            upd_form.fees.value = data.fees
            upd_form.year_started.value = data.year_started
            upd_form.duration.value = data.duration
            upd_form.cover_image.value = data.cover_img_path
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});