
var photo_btn = document.getElementById('photo_btn');
var update_btn = document.getElementById('update_btn');

function view(){
    var fullname = document.getElementById('fullname');
    var username = document.getElementById('username');
    var phone = document.getElementById('phone');
    var email = document.getElementById('email');
    var id_number = document.getElementById('id_number');
    var street = document.getElementById('street');
    var district = document.getElementById('district');
    var region = document.getElementById('region');
    var birthdate = document.getElementById('birthdate');
    var birthreg = document.getElementById('birthreg');
    var nationality = document.getElementById('nationality');

    var gender = document.getElementById('gender');
    var marital = document.getElementById('marital');
    var religion = document.getElementById('religion');
    var position = document.getElementById('position');
    var salary = document.getElementById('salary');

    var photo = document.getElementById('photo');
    fullname.disabled = false;
    const end = fullname.value.length;
    fullname.setSelectionRange(end, end);
    fullname.focus();
    
    username.disabled = false;
    phone.disabled = false;
    email.disabled = false;

    id_number.disabled = false;
    id_number.readOnly = true;

    street.disabled = false;
    street.readOnly = true;
    
    district.disabled = false;
    district.readOnly = true;
    
    region.disabled = false;
    region.readOnly = true;
    
    birthdate.disabled = false;
    birthdate.readOnly = true;
    
    birthreg.disabled = false;
    birthreg.readOnly = true;
    
    nationality.disabled = false;
    nationality.readOnly = true;

    gender.disabled = false;
    gender.readOnly = true;
    
    marital.disabled = false;
    marital.readOnly = true;
    
    religion.disabled = false;
    religion.readOnly = true;
    
    position.disabled = false;
    position.readOnly = true;
    
    salary.disabled = false;
    salary.readOnly = true;

    photo.disabled = false;

    update_btn.classList.remove("d-none");
    photo_btn.classList.remove("d-none");
}

function getImg(){
    document.getElementById('photo').click();
}

$(document).ready(function(){
    $('#photo').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showimage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});