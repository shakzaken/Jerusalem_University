



const deleteDegreeUrl = `${baseUrl}/degreesapi/delete`;



function deleteDegree(id){

    if(!confirm('Are you sure you want to delete this degree?')) { return; }
    let url = `${deleteDegreeUrl}/${id}`;
    fetch(url,{
        method: 'DELETE',
        headers: {
            'Content-type':'application/json'
        }
    })
    .then((res)=>{
         res.json().then(data =>{
            console.log(data)
            location.assign(`${baseUrl}/admindegrees`);
         })
         .catch(err =>console.log(err));  
    })
    .catch(err => console.log(err));
}