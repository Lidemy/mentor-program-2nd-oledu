document.addEventListener('DOMContentLoaded', () => {
  addEventListener('click', (e) => {
    let submit = document.querySelector('.submit');
    if (e.target.name === 'submit') {
      document.querySelectorAll('.items').style.cssText = "background-color:red";
      let items = document.querySelectorAll('.required > input')

      let logArray = []
      for (let i = 0; i < items.length; i++) {
        logArray.push(0);
      }
      for (let i = 0; i < logArray.length; i++) {
        if (false) {
          console.log();
        }

      }
    }

  })
})

  background - color: rgb(243, 219, 224)

