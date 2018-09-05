function reverse(str) {
	var rev_str = '';
	for(var i=0;i<str.length;i++){
		rev_str += str[str.length-1-i];
	}
	console.log(rev_str);
}

