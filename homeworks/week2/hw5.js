function add(a, b) {

	var shorterNum = a.length >= b.length ?	b : a; 
	var longerNum = a.length >= b.length ? a : b;

	var lArray = longerNum.split('').reverse();
	var sArray = shorterNum.split('').reverse()

	console.log(lArray);
	console.log(sArray);

	var diff = longerNum.length - shorterNum.length;
	while(diff>0){
		sArray.push('0');
		diff--;
	}

	console.log(lArray);
	console.log(sArray);

	var sumArray = [];
	for (var i = 0; i < lArray.length; i++) {
		var digitSum = parseInt(lArray[i]) + parseInt(sArray[i]);
		sumArray.push(digitSum);
	}

	for (var i = 0; i < sumArray.length-1; i++) {
		sumArray[i+1] += Math.floor(sumArray[i]/10);		
		sumArray[i] = sumArray[i]%10;
	}
	return(sumArray.reverse().join(''));
}
console.log(add('1','999'))
module.exports = add;