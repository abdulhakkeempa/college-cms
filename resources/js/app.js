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
            upd_form.user_name.value = data.name;
            upd_form.designation.value = data.designation;
            upd_form.joined_year.value = data.joined_year;
            upd_form.iqac.value = data.iqac;
            upd_form.account_type.value = data.acc_type;
            upd_form.user_email.value = data.email;
            upd_form.portfolio.value = data.portfolio;
            upd_form.phone_number.value = data.phone_number;
            upd_form.address.value = data.address;
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});


$(".user-dlt-btn").click(function () {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/users/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            messageBox("#success-box",data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            console.log('Error:', data);
        }
    });
});

//user page ajax end


//course page ajax start

$(".course-view-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    // alert(id);
    var course = $(this).attr('value');
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
            var courseName = document.getElementById("course-span");
            courseName.innerHTML = course;
            program_structure.innerHTML = "";
            timetable.innerHTML = "";
            $.each(data["program_structure"], function (key, value) {
                var ps = 
                `<div class="col-6">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <p><strong>${value.program_structure_year}</strong>
                                <a href="${storage_folder}/${value.file_name}" class="btn">
                                    <i class="bi bi-file-pdf h4 text-success" value=""></i>
                                </a>
                                <button type="button" class="btn btn-link btn-sm btn-rounded inline-block ps-dlt-btn" data-ps-id="${value.program_structure_id}">
                                    <i class="bi bi-trash3-fill h4 text-danger"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>`
                program_structure.insertAdjacentHTML("afterbegin", ps)
            });
            $.each(data["timetable"], function (key, value) {
                var tb =
                    `<div class="col-6">
                    <div class="card" style="width: 13rem;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div><strong>${value.semester}</strong>
                                <a href="${storage_folder}/${value.file_name}" class="btn">
                                    <i class="bi bi-file-pdf h4 text-success"></i>
                                </a>
                                <button type="button" class="btn btn-link btn-sm btn-rounded inline-block timetable-dlt-btn" data-timetable-id="${value.timetable_id}">
                                    <i class="bi bi-trash3-fill h4 text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`
                timetable.insertAdjacentHTML("afterbegin", tb)
            });
        },
        error: function (data) {
            messageBox("#error-box","Some unexpected error occured!");
            console.log('Error:', data);
        }
    });
});


$(".course-dlt-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    // alert(id);
    $.ajax({
        url: "/courses/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            messageBox("#success-box", data.message);
            setTimeout(() => {
                window.location.reload();
            }, 1000)
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            console.log('Error:', data);
        }
    });
});

$(".course-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
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

//program-structure delete
$("#ps").on("click", ".ps-dlt-btn", function () {
    var ps_id = $(this).data('ps-id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/courses/ps/" + ps_id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#success-box",data.message);
            setTimeout(() => {
                window.location.reload();
            },1000)
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            console.log('Error:', data);
        }
    });
});

//timetable delete
$("#tb").on("click",".timetable-dlt-btn",function () {
    var timetable_id = $(this).data('timetable-id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/courses/tb/" + timetable_id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#success-box", data.message);
            setTimeout(() => {
                window.location.reload();
            }, 1000)
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            console.log('Error:', data);
        }
    });
});


//course page ajax end



//phd page ajax start

$(".phd-dlt-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/phd/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#success-box",data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            console.log('Error:', data);
            messageBox("#error-box",data.message);
        }
    });
});

$(".phd-edit-btn").click(function () {
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
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

//modal to add photos to album.
$(".photos-album-btn").click(function (e) {
    e.preventDefault();
    var album_id = $(this).attr('value');
    $('#photosModal').modal('show');
    var photo_form = document.getElementById("photo_form");
    photo_form.album_id.value = album_id;
    console.log(photo_form.album_id.value);
});

//delete request to delete a photo from an album.
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
            messageBox("#success-box", data.message);
            setTimeout(() => {
                window.location.reload()
            }, 1000)
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            // console.log('Error:', data);
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
            // console.log(album_update_form.album_title.value);
        },
        error: function (data) {
            messageBox("#error-box","Some unexpected errors occured!");
            console.log('Error:', data);
        }
    });
});


//album delete ajax request
$(".album-dlt-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/album/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#success-box",data.message);
            setTimeout(function (){
                window.location.reload();
            },1000);
        },
        error: function (data) {
            messageBox("#error-box",data.message);
            console.log('Error:', data);
        }
    });
});

//set album cover ajax
$(".set-album-cover-btn").click(function (e) {
    e.preventDefault();
    var photo_id = $(this).data('photo-id');
    var album_id = $(this).data('album-id');  // $(this) refers to button that was clicked
    // console.log(photo_id);
    // console.log(album_id);

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
            messageBox("#success-box",data.message);
        },
        error: function (data) {
            messageBox("#error-box", data.message);
            // console.log('Error:', data);
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
            console.log(data);
            messageBox("#events-success-box", data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            console.log(data);
            messageBox("#events-error-box", data.message);
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
            messageBox("#news-success-box", data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            messageBox("#news-error-box", data.message);
        }
    });
});


//placement and awards page start

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
            upd_form.placement_student_name.value = data.placement.student_name
            upd_form.placement_course_id.value = data.placement.course_id
            upd_form.placement_batch.value = data.placement.batch
            upd_form.placement_company.value = data.placement.company
            upd_form.placement_job_role.value = data.placement.job_role
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
            messageBox("#placement-success-box", data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            messageBox("#placement-error-box", data.message);
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
        url: "/awards/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#awards-success-box", data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            messageBox("#awards-error-box", data.message);
        }
    });
});

//placement and awards page finished.


// MoU Page Edit and Delete Start //

// MoU Edit
$(".mou-edit-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/mou/" + id,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#MoUUpdateModal').modal('show');
            var upd_form = document.getElementById("mou_edit_form")
            upd_form.setAttribute("action", "/mou/" + id);
            upd_form.title.value = data.mou.title
            upd_form.year.value = data.mou.year
            upd_form.description.value = data.mou.description
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// MoU delete
$(".mou-dlt-btn").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('value'); // $(this) refers to button that was clicked
    $.ajax({
        url: "/mou/" + id,
        type: "DELETE",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            messageBox("#success-box", data.message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        },
        error: function (data) {
            messageBox("#error-box", data.message);
        }
    });
});

// MoU Edit and Delete - End //

function messageBox(elementId,message) {
    try {
        var msgBox = $(elementId);
    } catch (error) {
        console.log("Unable to catch the elements");
    }
    msgBox.text(message).removeClass('d-none');
    msgBox.html(message + `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`).removeClass('d-none');
}