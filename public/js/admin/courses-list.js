

const deleteCourseUrl = `${baseUrl}/coursesapi/delete`;


function deleteCourse(id){

    if(!confirm('Are you sure you want to delete this course?')) { return; }
    let url = `${deleteCourseUrl}/${id}`;
    fetch(url,{
        method: 'DELETE',
        headers: {
            'Content-type':'application/json'
        }
    })
    .then((res)=>{
         res.json().then(data =>{
            console.log(data)
            location.assign(`${baseUrl}/admincourses`);
         })
         .catch(err =>console.log(err));  
    })
    .catch(err => console.log(err));
}