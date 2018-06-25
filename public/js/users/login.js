/* ---- Variables -------*/



const loginUrl = `${baseUrl}/usersapi/login`;


const inputGroup = new InputGroup('userForm');
const http = new Http();
const button = document.querySelector('.userForm-btn');
const form = document.querySelector('.login-form');




/* ----- Event Listeners -----*/




button.addEventListener('click',(e)=>{ 
   
    if(validateInput()) {
          form.submit(); 
    }

   
  
});




/* --------------------------- Functions -----------------------*/


function validateInput(){
    inputGroup.reset();
    inputGroup.email.required().length(2,255).isEmail();
    inputGroup.password.required().length(4,100);

    return inputGroup.isValid();
 }