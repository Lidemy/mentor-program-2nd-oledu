function isPalindromes(str) {
	var reversedStr = '';
	for (var i = 0; i < str.length; i++) {
		reversedStr += str[str.length-1-i];
	}
	for (var i = 0; i < str.length; i++) {
		if(str[i]!=reversedStr[i]){
			return false;
		}else{
			return true;
		}
	}
  
}

console.log(isPalindromes('jigv'))
module.exports = isPalindromes