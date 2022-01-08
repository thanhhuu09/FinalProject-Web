// Onload window event
window.onload = function() {
    if (window.location.href.indexOf('manageAccount.php') > -1) {
        loadEmployee()

        $("#add-employee-btn").click(function () {
            $('#new-employee-dialog').modal({show: true});
            $('#confirm-add').click(function () {
            $.ajax({
                    url: "http://localhost:8888/FinalProject-Web/API/add-Employee.php",
                    type: "post", //send it through get method
                    contentType: 'application/json',
                    dataType: "json",
                    data: JSON.stringify({ 
                        username: $('#username').val() ,
                        name: $('#name').val() ,
                        position: $('#position').val(),
                        department: $('#department').val()
                    }),
                    success: function(respone) {
                        if (respone.code == 0) {
                            $('#new-employee-dialog').modal('toggle');
                            loadEmployee()
                        }
                        else {
                            $('#add-employee-error').show()
                            $('#add-employee-error').html(respone.message)
                        }
                    }
                });
            })
        });

    }
    
}

/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "310px";
}

/* Set the width of the side navigation to 0 */
function closeNav(){
    document.getElementById("mySidenav").style.width = "0px";
}

function getEmployee(e) {
    let user = $(e).attr('user')
    let selecteduser= JSON.parse(user)
    $('#info-employee-dialog').modal({show: true});
    $('.employee-info').html(selecteduser)
    $.ajax({
        type: "GET",
        url: "http://localhost:8888/FinalProject-Web/API/get-Employee.php?" + $.param({
            "id": selecteduser
        }),
        success: function(respone) {
            if (respone.code == 0) {
                $('.employee-info-username').html(respone.data.username)
                $('.employee-info-name').html(respone.data.name)
                $('.employee-info-position').html(respone.data.position)
                $('.employee-info-department').html(respone.data.department)
                $("#employee-avatar").attr("src",`./avatar/${respone.data.avatar}`);
            }
        }
    });
}

// Function reset password
function resetPass(e) {
    $('#resetPass').modal({show: true});
    let user = $(e.parentNode.parentNode).attr('user')
    let selecteduser= JSON.parse(user)
    $('.reset-user').html(selecteduser) 
    $('.resetpass-btn').click(function () {
        $.ajax({
            type: "GET",
            url: "http://localhost:8888/FinalProject-Web/API/reset-Password.php?" + $.param({
                "id": selecteduser
            }),
            success: function(respone) {
                if (respone.code == 0) {
                    $('#resetPass').modal('toggle');
                    loadEmployee()
                }
                else {
                    $('#reset-password-error').show()
                    $('#reset-password-error').html(respone.message)
                }
            }
        });
    })
}
// validation form
function message(text) {
    let errorMessage = document.getElementById('add-employee-error');
    errorMessage.style.display = '';
    errorMessage.innerHTML = text;
}
function hideMessage() {
    let errorMessage = document.getElementById('add-employee-error');
    document.getElementById('confirm-add').type = "submit";
    errorMessage.style.display = 'none';
}
function validateAddEmployeeForm() {
    let checkUsername = document.getElementById("username").value.trim();
    let checkName = document.getElementById("name").value;
    let usernameRegex = /^[a-z0-9_-]{6,20}$/;

    if (checkUsername.length === 0 && checkName.length === 0) {
        message("Vui lòng nhập đầy đủ thông tin")
    }else if(checkUsername.length === 0){
        message("Vui lòng điền tên đăng nhập");
    }else if (checkName.length === 0){
        message("Vui lòng nhập họ và tên nhân viên");
    }else if(checkUsername.length < 6){
        message("Tên đăng nhập quá ngắn");
    }else  if(!checkUsername.match(usernameRegex)){
        message("Tên đăng nhập không hợp lệ");
    }else{
        hideMessage();
    }
}

// Function to get list of employee
function loadEmployee() {
    $.ajax({
        url: "http://localhost:8888/FinalProject-Web/API/get-Employees.php", //Change your localhost link
        type: "get", //send it through get method
        dataType: "json",
        success: function(data) {
            $('#list-employee .management-item').remove();
            data.data.forEach(employee => {
                let employeeRow = $(`
                <div class="management-item" onclick="getEmployee(this)">
                    <div class="row">
                        <img class="avatar dot-work" src="avatar/${employee.avatar}">
                        <div style="flex: 1;">
                            <a class="task">${employee.name}</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">Phòng ban: ${employee.department}</a><br>
                            </div>
                        </div>
                        <div class="resetpass" href="#" onclick="resetPass(this)">ResetPassword</div>
                    </div>
                </div>
                `)
                employeeRow.attr('user',JSON.stringify(employee.username))
                $('#list-employee').append(employeeRow)
            });
        }
      });
}


let check = false;

document.addEventListener("click", (evt) => {
    const flyoutElement = document.getElementById("user-info");
    let targetElement = evt.target; // clicked element  
    do {
        if (targetElement == flyoutElement) {
            // This is a click inside.
            if (!check) {
                check = true;
                document.getElementsByClassName("navbar-user-list")[0].style.display = 'block';
                return;
            }
            else if (check) {
                check = false;
                document.getElementsByClassName("navbar-user-list")[0].style.display = 'none';
                return;
            }
        }
        // Go up the DOM
        targetElement = targetElement.parentNode;
    } while (targetElement);
    
    // This is a click outside.
    check = false;
    document.getElementsByClassName("navbar-user-list")[0].style.display = 'none';
});