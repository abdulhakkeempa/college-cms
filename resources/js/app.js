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

//user page ajax start

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

//user page ajax end


//course page ajax start

$(".course-view-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    // alert(id);
    var course = $(this).attr('value');
    console.log(course);
    $.ajax({
        url: "/courses/view/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#course_detail").modal("show");
            var program_structure = document.getElementById("ps")
            var timetable = document.getElementById("tb")
            program_structure.innerHTML = "";
            timetable.innerHTML = "";
            $.each(data["program_structure"], function (key, value) {
                console.log(value.course_id);
                var ps = 
                `<div class="col-6">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <p>${value.program_structure_year}
                                <a href="${storage_folder}/${value.file_name}" class="btn">
                                    <i class="bi bi-file-pdf h4 text-success" value=""></i>
                                </a>
                                <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                    <i class="bi bi-trash3-fill h4 text-danger" value="${value.program_structure_year}"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>`
                program_structure.insertAdjacentHTML("afterbegin", ps)
            });
            $.each(data["timetable"], function (key, value) {
                console.log(value.course_id);
                var tb =
                    `<div class="col-6">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <p>${value.semester}
                                <a href="${storage_folder}/${value.file_name}" class="btn">
                                    <i class="bi bi-file-pdf h4 text-success" value=""></i>
                                </a>
                                <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                    <i class="bi bi-trash3-fill h4 text-danger" value="${value.program_structure_year}"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>`
                timetable.insertAdjacentHTML("afterbegin", tb)
            });
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
    console.log("Hello");
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

//course page ajax end



//phd page ajax start

$(".phd-dlt-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        url: "/phd/" + id,
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

$(".phd-edit-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    alert(id);
    $.ajax({
        url: "/phd/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            var data = JSON.parse(data);
            $('#phdEditModal').modal('show');
            var upd_form = document.getElementById("phd_edit_form")
            upd_form.setAttribute("action", "/phd/" + id);
            upd_form.scholar_name.value = data.scholar_name
            upd_form.title.value = data.title
            upd_form.guide.value = data.guide
            upd_form.awarded_date.value = data.awarded_date
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//phd page ajax end


//password change ajax - profile page

$(".change-pwd-btn").click(function () {
    $.ajax({
        url: "/profile",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            alert(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});



$(".add-photos-to-album").click(function () {
    var album_id = $(this).attr('value');
    var images = document.getElementById("image-form").images

    //data for post route: image to album 
    var data = {
        album_id: album_id,
        images: images
    }
    
    alert(data)

    $.ajax({
        url: "/photos/album",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        success: function (data) {
            alert(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//modal to add photos to album.
$(".photos-album-btn").click(function () {
    var album_id = $(this).attr('value');
    $('#photosModal').modal('show');
    var photo_form = document.getElementById("photo_form");
    photo_form.album_id.value = album_id;
    console.log(photo_form.album_id.value);
});

//delete request to delete a photo from album.
$(".photo-dlt-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    console.log(id);
    console.log($('meta[name="csrf-token"]').attr('content'));
    $.ajax({
        url: "/photos/album/" + id,
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


//album-ajax
//album-edit ajax

$(".album-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    console.log(id);
    console.log($('meta[name="csrf-token"]').attr('content'));
    $.ajax({
        url: "album/data/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#albumUpdateModal').modal('show');
            var album_update_form = document.getElementById("album_edit_form");
            album_update_form.action = "album/data/"+data.album.album_id;
            album_update_form.album_title.value = data.album.album_title;
            console.log(album_update_form.album_title.value);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});


//album delete ajax request
$(".album-dlt-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    console.log(id);
    $.ajax({
        url: "/album/" + id,
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

//set album cover ajax
$(".set-album-cover-btn").click(function (e) {
    e.preventDefault();
    var photo_id = $(this).data('photo-id');
    var album_id = $(this).data('album-id');  // $(this) refers to button that was clicked
    console.log(photo_id);
    console.log(album_id);

    //post data.
    var data = {
        "photo_id": photo_id
    }

    $.ajax({
        url: "/album/cover/" + album_id,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:data,
        success: function (data) {
            console.log(data);
            window.location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//news & events ajax start

//events edit
$(".event-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/events/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#editEventsModal').modal('show');
            var upd_form = document.getElementById("events_edit_form")
            upd_form.setAttribute("action", "/events/" + id);
            upd_form.event_title.value = data.event.event_title
            upd_form.event_desc.value = data.event.event_desc
            upd_form.event_date.value = data.event.event_date
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});



//events delete
$(".event-dlt-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/events/" + id,
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

//news edit
$(".news-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/news/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#editNewsModal').modal('show');
            var upd_form = document.getElementById("news_edit_form")
            upd_form.setAttribute("action", "/news/" + id);
            upd_form.news_title.value = data.news.news_title
            upd_form.news_desc.value = data.news.news_desc
            upd_form.news_date.value = data.news.news_date
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});


//news delete
$(".news-dlt-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/news/" + id,
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


//placement page start

//placement edit

$(".placement-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/placement/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#editPlacementModal').modal('show');
            var upd_form = document.getElementById("edit_placement_form")
            upd_form.setAttribute("action", "/placement/" + id);
            upd_form.student_name.value = data.placement.student_name
            upd_form.course_id.value = data.placement.course_id
            upd_form.batch.value = data.placement.batch
            upd_form.company.value = data.placement.company
            upd_form.job_role.value = data.placement.job_role
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//placement delete
$(".placement-dlt-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/placement/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            window.location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//awards edit
$(".award-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/awards/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#editAwardModal').modal('show');
            var upd_form = document.getElementById("edit_award_form")
            upd_form.setAttribute("action", "/awards/" + id);
            upd_form.student_name.value = data.award.student_name
            upd_form.course_id.value = data.award.course_id
            upd_form.batch.value = data.award.batch
            upd_form.award_desc.value = data.award.award_desc
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//award delete
$(".award-dlt-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/award/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            window.location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});