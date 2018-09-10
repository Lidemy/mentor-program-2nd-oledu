function alphaSwap(str) {
	function isUpper(argument) {
		return argument === argument.toUpperCase();
	}
	var strSplit = str.split('');
	console.log(`strSplit:${strSplit}`)
	var changedStr = [];
	for (var i = 0; i < strSplit.length; i++) {
		if(isUpper(strSplit[i])){
			changedStr[i] = strSplit[i].toLowerCase();
		}else{
			changedStr[i] = strSplit[i].toUpperCase();
		}
	}
	var newStr = changedStr.join('');
	return newStr;
	
}

module.exports = alphaSwap