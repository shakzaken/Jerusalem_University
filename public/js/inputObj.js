

class InputObj{

    constructor(name,element,output){
        this.name = name;
        this.element = element;
        this.output = output;
        this.valid = true;
        this.value = '';
        this.properName = this.changeString(this.name);

    }

    required(){
        if(!this.valid) { return this; }
        if (this.value ==="" || this.value === undefined || this.value === null){
            this.output.innerHTML = `${this.properName} is required`;
            this.valid = false;
        }
        return this;
    }

    minMax(min,max){
        if(!this.valid) { return this; }
        if(!Number(this.value) || this.value < min || this.value > max ){
            this.output.innerHTML = `${this.properName} should be between ${min} to ${max}`;
            this.valid = false;
        }
        return this;
    }
    length(min,max){
        if(!this.valid) { return this; }
        if( Number(this.value) ) {
            this.value = ''+this.value;
        }
        if(this.value.length < min || this.value.length > max){
            this.output.innerHTML = `${this.properName} length should be between ${min} to ${max}`;
            this.valid = false;
        }
        return this;
    }
    isNumber(){
        if(!this.valid) { return this; }
        if(!Number(this.value)){
            this.output.innerHTML = `${this.properName} is not a number`;
            this.valid = false;
        }  
        return this;  
    }
    isEmail(){
        if(!this.valid) { return this; }
        const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
        if(!re.test(this.value)){
            this.output.innerHTML = `Email is not valid`;
            this.valid = false;
        }
        return this;
    }

    imageSize(){
        if(!this.valid)  return this; 
        if(this.value.size > 1048576){
            this.output.innerHTML = `Image size is to large`;
            this.valid = false;
        }
        return this;
    }
    

   
    setValue(){
        if(this.element.type === 'file'){
            this.value = this.element.files[0];
        }
        else if(Number(this.element.value)){
            this.value = Number(this.element.value);
        }else{
            this.value = this.element.value;
        }  
    }

    isValid(){
        return this.valid;
    }

    changeString(name){
        
        let char = name.charAt(0).toUpperCase();
        name = name.substr(1);
        let result = char+name;
        return result.replace('_',' ');
    }

    
    
   
}// end class

class InputGroup{

    constructor(selector){
        let group = document.querySelectorAll(`.${selector}`);
        group.forEach((element)=>{
          let output = document.querySelector(`.${selector}-${element.name}-err`);
          this[element.name] = new InputObj(element.name,element,output);
          
        });
        
    }

    reset(){
        for(let element in this){
            this[element].valid = true;
            this[element].output.innerHTML = '';
            this[element].setValue();
        }
    }

    isValid(){
        let flag = true;
        for(let element in this){
            flag = flag && this[element].isValid();
        }
        return flag;
    }

    setValues(){
        for(let element in this){
            this[element].setValue();
        }
    }

    getValues(){
        let result = {};
        for(let element in this){
            result[this[element].name] = this[element].value;
        }
        return result;
    }

    getFormData(){
        let result = new FormData();
        for(let element in this){
            result.append(this[element].name,this[element].value);
        }
        return result; 
    }

    validPasswords(){
        if(this.password.value !== this.confirm_password.value){
            this.password.output.innerHTML = 'Passwords do not match';
            this.password.valid = false;
        }
    }

}