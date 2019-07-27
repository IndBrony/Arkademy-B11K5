function cetak_gambar(length){
	if(length % 2 == 0){
    	return "panjang harus ganjil";
    }    
    for(let i = 0; i < length; i++){    
        let buffer = "";
    	for(let j = 0; j < length; j++){
        	if(j == 0 || j == length - 1 || i == (length - 1) / 2){
            	buffer += " * ";
            }else{
            	buffer += " = ";
            }
    	} 
        console.log(buffer);
    }
}
