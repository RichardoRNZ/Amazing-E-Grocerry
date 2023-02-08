const profileMenu = document.getElementById("profilemenu");
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
function ProfileMenu(){
    profileMenu.classList.toggle("open-menu");

}

function AddRightPanel()
{
    container.classList.add('right-panel-active');
}
function RemoveRightPanel()
{
    container.classList.remove('right-panel-active');
}

$(document).on("click", "#update-role", function() {
    let id = $(this).data('id');

    let role = $(this).data('role');


    $("#id").val(id);
    $('#role').val(role);
    $('#exampleModal').modal('show');



});



$(document).ready(function() {
    window.setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);
});



