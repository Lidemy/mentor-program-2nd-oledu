function isPrime(n) {
	switch(n){
		case 1: 
			return false;
			break;
		case 2:
			return true;
			break;
		
		default:
			for(i=2;i<n;i++){
				if(n%i==0){
					return false;
					break;
					console.log(44)
				}else if(i==n-1){
					return true;
					break;
				}
			}
	}
}
module.exports = isPrime