document.addEventListener('DOMContentLoaded', () => {
  addEventListener('click', (e) => {
    let submit = document.querySelector('.submit');
    console.log(e.target.name);

    if (e.target.name === 'submit') {
      //let red = document.querySelectorAll('.items');
      let items = document.querySelectorAll('.required > input')
      console.log(items[0].type);
      for (let i = 0; i < items.length; i++) {
        if (items != 'radio' && items[i].value === '') {
          items[i].parentElement.style['background-color'] = 'rgb(243, 189, 189)';
          items[i].style['background-color'] = 'rgb(243, 189, 189)';
        } else {
          items[i].parentElement.style['background-color'] = 'white';
          items[i].style['background-color'] = 'white';
        }
      }
      let radioValue = document.querySelector('input[name="class"]:checked')
      if (radioValue === null) {
        document.querySelector('input[name="class"]').parentElement.style['background-color'] = 'rgb(243, 189, 189)';
      }

    }
  })
})