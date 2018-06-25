



/* ---- Variables -------*/

const addUserUrl = `${baseUrl}/usersapi/addUser`;

const inputGroup = new InputGroup('userForm');
const http = new Http();
const button = document.querySelector('.userForm-btn');

const imageUploade = new ImageUpload();
const imageInput = document.querySelector('.image-input');
const imageOutput = document.querySelector('.show-image');



/* ----- Event Listeners -----*/

imageInput.addEventListener('change',()=>{   
    imageUploade.readImage(imageInput,imageOutput);
});

button.addEventListener('click',()=>{ 
   
    if(!validateInput()) {  return; }
    let formData = inputGroup.getFormData();
    http.post(addUserUrl,formData)
    .then(res =>{
        console.log(res);
        location.assign(`${baseUrl}/adminusers/`);
    })
    .catch(err => console.log(err));  
    
});




/* --------------------------- Functions -----------------------*/


function validateInput(){
    inputGroup.reset();
    inputGroup.first_name.required().length(2,255);
    inputGroup.last_name.required().length(2,1024);
    inputGroup.email.required().length(2,255).isEmail();
    inputGroup.role.required().length(2,255);
    inputGroup.password.required().length(4,100);
    inputGroup.confirm_password.required().length(4,100);
    inputGroup.image.required();

    if(inputGroup.isValid()) {
        inputGroup.validPasswords();
    }

    return inputGroup.isValid();
 }