$(document).ready(function(){
    // delete user
    deleteUser();
    // add user
    addUser();
    //
    editUser();

    $("#dark-mode").click(function () {
        $("html").toggleClass('darkMode');
    });
});