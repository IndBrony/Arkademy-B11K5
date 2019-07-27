function is_username_valid(username) {
    let min_valid_length = 5;
    let max_valid_length = 9;
    
    let valid_start = username.match(/^\d | ^\W/g) == null? false:true;
  
    if(valid_start){
  		return false;
  	}
    
    let is_length_valid = username.length < min_valid_length && username.length > max_valid_length? false:true;
    
    if(!is_length_valid){
    	return false;
    }
    
    let contains_lowercase = username.match(/[a-z]/g) == null? false:true;
    
  	if(!contains_lowercase){
  		return false;
  	}
    
    let contains_uppercase = username.match(/[A-Z]/g) == null? false:true;
    
  	if(!contains_uppercase){
  		return false;
  	}
  	return true;
}

function is_password_valid(password) {
    let valid_length = 8;
    
    let start_not_with_digit = password.match(/^\d/g) == null? false:true;
  
    if(start_not_with_digit){
  		return false;
  	}
    
    let is_length_valid = password.length < valid_length ? false:true;
    
    if(!is_length_valid){
    	return false;
    }
    
  	let contains_equal_sign = password.match(/=/g) == null? false:true;
    
  	if(!contains_equal_sign){
  		return false;
  	}
    
    let contains_lowercase = password.match(/[a-z]/g) == null? false:true;
    
  	if(!contains_lowercase){
  		return false;
  	}
    
    let contains_uppercase = password.match(/[A-Z]/g) == null? false:true;
    
  	if(!contains_uppercase){
  		return false;
  	}
  	return true;
}
