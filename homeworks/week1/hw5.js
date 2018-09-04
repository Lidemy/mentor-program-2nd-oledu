function join(str, concatStr) {
	var new_str = '';
	for(var i=0;i<str.length;i++){
		if(i==str.length-1){
			new_str += str[i];
		}else {
			new_str += str[i] + concatStr;
		}
	}
	console.log(new_str);

}

function repeat(str, times) {
	if(times==0){
		console.log('');
	}else if(times==1){
		console.log(str);
	}else if(times>1){
		var str_single = str
		for(i=2;i<=times;i++){
			str += str_single;
		}
		console.log(str);
	}
}
/* test
join([1, 2, 3], ',')
join(["my","name","is","oledu"]," ")
*/

/* test
repeat('oledu',10)
repeat('w',0)
repeat('apple',1)
*/