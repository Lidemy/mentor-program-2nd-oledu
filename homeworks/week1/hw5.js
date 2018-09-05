function join(str, concatStr) {
	var new_str='';
	for(i=0;i<str.length;i++){
		if(i==str.length-1){
			new_str += str[i];
		}else{
			new_str += str[i]+concatStr;
		}
	}
	return new_str;

}

function repeat(str, times) {
	var new_str ='';
	for(var i=1;i<=times;i++){
		new_str += str;
	}
	return new_str;
}
