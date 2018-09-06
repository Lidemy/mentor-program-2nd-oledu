function stars(n) {
	var star = [];
	for (var i=1; i<=n;i++) {
		var inner_star = '';
		for(var i=1;i<=n;i++){
			inner_star+='*';
			star.push(inner_star);
		}
	}
	console.log(star);

}

module.exports = stars;