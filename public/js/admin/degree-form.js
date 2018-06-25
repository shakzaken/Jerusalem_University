

/* --------------- Variabels ------------------- */


const addDegreeUrl = `${baseUrl}/degreesapi/addDegree`;


const inputGroup = new InputGroup('degreeForm');
const http = new Http();
const button = document.querySelector('.degree-btn');

const imageUploade = new ImageUpload();
const images = ['image1','image2','image3'];


/* ------------------- Event Listeners --------------------*/

images.forEach(imageName => { 
    let  imageOutput = document.querySelector(`.show-${imageName}`);
    let  imageInput = inputGroup[imageName].element;
    imageInput.addEventListener('change',()=>{   
        imageUploade.readImage(imageInput,imageOutput);
    });
});

button.addEventListener('click',()=>{ 
   
    if(!validateInput()) {  return;  }
    let formData = inputGroup.getFormData();
     
    http.post(addDegreeUrl,formData)
    .then(res =>{
        console.log(res);
        location.assign(`${baseUrl}/admindegrees/`);
    })
    .catch(err => console.log(err));
});



/* ------------------- Functions -------------------*/


function validateInput(){

    inputGroup.reset();
    inputGroup.name.required().length(2,255);
    inputGroup.full_name.required().length(2,255);
    inputGroup.description.required().length(2,1024);
    inputGroup.points.required().minMax(1,300);
    inputGroup.image1.required();
    inputGroup.image2.required();
    inputGroup.image3.required();

    return inputGroup.isValid();
 }
