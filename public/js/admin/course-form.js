
/* -------------- Variabels ------------------*/


const addCourseUrl = `${baseUrl}/coursesapi/addCourse`;

const inputGroup = new InputGroup('courseForm');
const http = new Http();
const button = document.querySelector('.courseForm-btn');

const imageUploade = new ImageUpload();
const imageOutput = document.querySelector(`.show-image`);
const imageInput = document.querySelector('.image-input');



/* --------------- Event Listeners ------------------- */


imageInput.addEventListener('change',()=>{   
    imageUploade.readImage(imageInput,imageOutput);
});

button.addEventListener('click',()=>{ 
   
    if(!validateInput()) {  return; }

    let inputFields = inputGroup.getFormData();
    let instructorArr = inputGroup.instructor.value.split(',',2);
    inputFields.set('instructor',instructorArr[1]);
    inputFields.append('instructorId',Number(instructorArr[0]));

    http.post(addCourseUrl,inputFields)
    .then(res =>{
        console.log(res);
        location.assign(`${baseUrl}/admincourses/`);
    })
    .catch(err => console.log(err)); 
});


/*------------ Functions ----------------*/

function validateInput(){

    inputGroup.reset();
    inputGroup.name.required().length(2,255);
    inputGroup.description.required().length(2,1024);
    inputGroup.field.required().length(2,255);
    inputGroup.points.required().minMax(1,100);
    inputGroup.instructor.required().length(2,255);
    inputGroup.image.required();

    return inputGroup.isValid();
 }