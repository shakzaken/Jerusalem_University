class InputList{
    constructor(names,selector){

        names.forEach(name => {
            let element = document.querySelector(`.${selector}-${name}`);
            let output = document.querySelector(`.${selector}-${name}-err`);
            this[name] = new InputClass(
                name,
                '',
                element,
                output
            );  
        });
    }
     
    clearElements(){
        let val;
        for(val in this){
            this[val].element.output = '';
        }
    }

    initFields(){
        for(let val in this){
            this[val].output.innerHTML = '';
            this[val].valid = true;
        }
        
    }

    getInputs(){
        let obj = {};
        for(let val in this){
            this[val].getInput();
            obj[val] = this[val].value
        }
        return obj;
    }

    checkNulls(){
        for(let val in this){
            this[val].checkNull();
        } 
    }
    

    getValid(){
        
        for(let val in this){
            if(!this[val].getValid()){
                return false;
            }
        }
        return true;
    }
}// -- end class --

class InputClass{
    constructor(name,value,element,output){
        this.element = element;
        this.value = value;
        this.name = name;
        this.output = output;
        this.valid = true;
    }

    getValid(){
        return this.valid;
    }

    getInput(){
        this.value = this.element.value;
    }

    checkNull(){
        if (this.value =='' || this.value == undefined || this.value == null){
            this.output.innerHTML = `${this.name} is required`;
            this.valid = false;
            return false;
        }
        else{
            true
        }
    }

    checkMinMax(min,max){

        if(Number(this.value) && this.value >= min && this.value <= max ){
            return true;
        }else{
            this.output.innerHTML = `${this.name} should be between ${min} to ${max}`;
            this.valid = false;
            return false;
        }
    }
    checkLength(min,max){
        if(this.value.length >= min && this.value.length <= max){
            return true;
        }else{
             this.output.innerHTML = `${this.name} length should be between ${min} to ${max}`;
             this.valid = false;
             return false;
        }
    }
    isNumber(){
        if(Number(this.value)){
            return true;
        }else{
            this.output.innerHTML = `${this.name} is not a number`;
            this.valid = false;
            return false;
        }
    }
}


class ImageUpload{

    constructor(){
        this.reader = new FileReader();  
    }
    readImage(imageInput,imageOutput){  
        
        let file = imageInput.files[0];
        this.reader.onloadend = function () {
            imageOutput.src = this.result;
        }
        
        if (file) {
            this.reader.readAsDataURL(file); 
        } else {
            imageOutput.src = "";
        }
    }
}


class Http{

    post(url,data){
        return new Promise((resolve,reject) =>{
            fetch(url,{
                method: 'post',
                body: data
                
            })
            .then((res)=>{
                resolve(res.text());
            })
            .catch((err) => reject(err));
        });
         
    }

    get(url){
        return fetch(url,{
            method: 'get',
            
        })
        .then((res)=>{
            return res.text();
        })
        .catch((err)=> console.log(err));

    }

    

}




