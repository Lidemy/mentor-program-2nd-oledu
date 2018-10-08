    var request = new XMLHttpRequest();
    request.open("GET",
      "https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=20&client_id=jzwhu4a97pxl89n5bolel9nqfb3p7k",
      true);
    request.send();
    request.onload = function () {
      if (request.status >= 200 && request.status <= 400) {
        var resp = request.responseText;
        var par = JSON.parse(resp)
      }
      var previewArray = document.querySelectorAll('.row__window>img');
      var shotArray = document.querySelectorAll('.shot')
      var infoArray = document.querySelectorAll('.info')
      console.log(previewArray);

      console.log(par.streams[2].channel.status);

      for (let i = 0; i < 20; i++) {
        previewArray[i].outerHTML = `<img src=${par.streams[i].preview.large} alt="" style="width:200px;height:150px;"></img>`;
        shotArray[i].outerHTML = `<div class="shot"><img src=${par.streams[i].channel.logo} style="width:50px;height:50px;" alt=""></div>`;
        infoArray[i].outerHTML = `<div class="info"><div class="status">${par.streams[i].channel.status}</div><div class="name">${par.streams[i].channel.name}</div></div>`
      }
    }