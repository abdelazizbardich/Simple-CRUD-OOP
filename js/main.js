$(document).ready(function(){
    if(localStorage.getItem('darkEnabled') == "true"){
        $("html").addClass('darkMode');
    }else{
        $("html").removeClass('darkMode');
    }
    // delete user
    deleteUser();
    // add user
    addUser();
    //
    editUser();

    $("#dark-mode").click(function () {
        $("html").toggleClass('darkMode');
        if(localStorage.getItem('darkEnabled') == "true"){
            localStorage.setItem('darkEnabled', 'false');
        }else{
            localStorage.setItem('darkEnabled', 'true');
        }
        console.log(localStorage.getItem('darkEnabled'));
    });
});