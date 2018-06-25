

/* ---- Variables -------*/


const addUserUrl = `${baseUrl}/usersapi/addUser`;
const loginUrl = `${baseUrl}/users/login`;


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
    formData.append('role','student');


    fetch(addUserUrl,{
        method: 'post',
        body: formData
    })
    .then(res =>{
         res.json()
         .then(result =>{
            console.log(result)
            console.log(inputGroup);
            console.log(result.element);
            inputGroup[result.element].output.innerHTML = result.msg;
            
         })
         .catch(err =>console.log(err) );
         if(res.status === 200){
            location.assign(`${loginUrl}`);
         } 
    })
    .catch(err => console.log(err));
        
      

        


    /*
    http.post(addUserUrl,formData)
    .then(res =>{
        console.log(res);
        location.assign(`${loginUrl}`);
    })
    .catch(err => console.log(err));  
    */
});




/* --------------------------- Functions -----------------------*/


function validateInput(){
    inputGroup.reset();
    inputGroup.first_name.required().length(2,255);
    inputGroup.last_name.required().length(2,1024);
    inputGroup.email.required().length(2,255).isEmail();
    inputGroup.password.required().length(4,100);
    inputGroup.confirm_password.required().length(4,100);
    inputGroup.image.required().imageSize();

    if(inputGroup.isValid()) {
        inputGroup.validPasswords();
    }

    return inputGroup.isValid();
 }


 


 