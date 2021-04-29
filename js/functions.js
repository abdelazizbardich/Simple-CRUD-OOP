//
function deleteUser(){
    $('.delete-user').click(function(){
        let id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.post({
                  url:'./delete-user.php',
                  data:{'id':id},
                  success: function(res){
                      console.log(res);
                      let result = JSON.parse(res);
                      if(result['state'] == 200){
                        $(`tr[data-id="${id}"]`).remove();
                        swal("User deleted successfully!", {
                            icon: "success",
                        });
                      }
                  }
              })
            } else {
            //   swal("Your imaginary file is safe!");
            }
          });
    });
}
// add user 
function addUser() {
    $("#add-user").submit(function(e){
        e.preventDefault();
        let formData = $(this).serialize();
        $.post({
            url:'./add-user.php',
            data:formData,
            success: function(res){
                let responce = JSON.parse(res);
                if(responce['state'] == 200){
                    clearFields();
                    $("table tbody").prepend(`
                            <tr>
                            <td>${responce['lastInsert']['id']}</td>
                            <td>${responce['lastInsert']['name']}</td>
                            <td>${responce['lastInsert']['email']}</td>
                            <td>${responce['lastInsert']['age']}</td>
                            <td>
                                <a href="./edit-user.php?id=${responce['lastInsert']['id']}" class="btn btn-primary">Edit</a>
                                <a class="btn btn-danger delete-user" data-id="${responce['lastInsert']['id']}">Delete</a>
                            </td>
                        </tr>
                    `);
                    deleteUser();
                }
            }
        })
    })
}

// edit user

function editUser() {
    $("#edit-user").submit(function(e){
        e.preventDefault();
        let formData = $(this).serialize();
        $.post({
            url:'./update-user.php',
            data:formData,
            success: function(res){
                let responce = JSON.parse(res);
                if(responce['state'] == 200){
                    swal("Good job!", "User updated successfully", "success").then(() => {
                        location.href = "./index.php";
                      });
                }
            }
        })
    })
}


// clear fileds
function clearFields() {
    $("input").val('');
}