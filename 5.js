function sort_array(array){
    for(let i = 0; i < array.length; i++){
        for(let j = 0; j < array.length - 1; j++){
            if(array[j].length > array[(j+1)].length){
				let temp = array[j];
                array[j] = array[(j+1)];
            	array[(j+1)] = temp;
            }
        }
    }
    for(let i = 0; i < array.length; i++){
        for(let j = 0; j < array[i].length - 1; j++){
            for(let k = 0; k < array[i].length - 1; k++){
                if(array[i][k] > array[i][(k+1)]){
                    let temp = array[i][k];
                    array[i][k] = array[i][(k+1)];
                    array[i][(k+1)] = temp;
                }
            }
        }
    }
    return array;
}
