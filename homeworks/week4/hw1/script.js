document.addEventListener('DOMContentLoaded', () => {
  let num = document.querySelector('.monitor');
  let cacString = '';
  let cacStringTemp = '';
  addEventListener('click', (e) => {
    if (e.target.innerHTML === 'AC') {
      num.innerHTML = '0';
      cacString = '';
      cacStringTemp = '';
    } else if (e.target.innerHTML === '=') {
      let answer = ans(cacString);
      num.innerHTML = answer;
      cacStringTemp = '';
      cacString = '';
    } else if (e.target.innerHTML.length === 1 && e.target.innerHTML.match(/[0-9]/)) {
      cacStringTemp += e.target.innerHTML;
      cacString += e.target.innerHTML;
      num.innerHTML = cacStringTemp;
    } else if (e.target.innerHTML.length === 1 && e.target.innerHTML.match(/[^0-9]/)) {
      cacString += e.target.innerHTML;
      num.innerHTML = '0';
      cacStringTemp = '';
    }
  })
})

function ans(cacString) {
  var cacArray = cacString.split(/[^0-9]/)
  var symbol = cacString.match(/[^0-9]/ig)
  console.log(cacArray);
  console.log(symbol);
  switch (symbol[symbol.length - 1]) {
    case '+':
      return parseInt(cacArray[0]) + parseInt(cacArray[cacArray.length - 1]);
    case '-':
      return parseInt(cacArray[0]) - parseInt(cacArray[cacArray.length - 1]);
    case 'x':
      return parseInt(cacArray[0]) * parseInt(cacArray[cacArray.length - 1]);
    case '÷':
      return parseInt(cacArray[0]) / parseInt(cacArray[cacArray.length - 1]);
  }
}
