    var request = new XMLHttpRequest();
    request.open("GET",
      "https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=100&client_id=jzwhu4a97pxl89n5bolel9nqfb3p7k",
      true);
    request.send();
    request.onload = function () {
      if (request.status >= 200 && request.status <= 400) {
        var resp = request.responseText;
        var par = JSON.parse(resp)
      }

      var container = document.querySelector('.container')

      for (let i = 0; i < 100; i++) {
        container.innerHTML +=
          `<div class="row__window">
            <img src=${par.streams[i].preview.large} style="width:200px;height:150px;"></img>
            <div class="shot"><img src =${par.streams[i].channel.logo} style = "width:50px;height:50px;"></div>
            <div class="info"> 
              <div class="status" > ${par.streams[i].channel.status} </div>
              <div class="name">${par.streams[i].channel.name}</div>
            </div>
          </div>`
      }
    }