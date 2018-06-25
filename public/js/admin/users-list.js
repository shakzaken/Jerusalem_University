

const deleteUserUrl = `${baseUrl}/usersapi/delete`;




function deleteUser(id){

    if(!confirm('Are you sure you want to delete this user?')) { return; }
    let url = `${deleteUserUrl}/${id}`;
    fetch(url,{
        method: 'DELETE',
        headers: {
            'Content-type':'application/json'
        }
    })
    .then((res)=>{
         res.json().then(data =>{
            console.log(data)
            location.assign(`${baseUrl}/adminusers`);
         })
         .catch(err =>console.log(err));  
    })
    .catch(err => console.log(err));
}