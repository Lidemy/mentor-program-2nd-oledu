1. 什麼是 DOM？
  DOM 建立起網頁與程式語言互動的橋樑，把 HTML 文件結構化，並讓 Script 文件可以存取及改變網頁的內容和風格。

2. 什麼是 Ajax？
  Ajax (Asynchronous 非同步 JavaScript and XML) 是一種讓網頁不必重新讀取就可以送出 request 的技術。

3. HTTP method 有哪幾個？有什麼不一樣？
  HTTP mathod 也稱為 HTTP 動詞
  GET：取得我們想要的資料。
  HEAD：和 get 有點像，只是 head 只會取的 HTTP header 的資料。
  POST：新增一項資料。（如果存在會新增一個新的）。
  PUT：新增一項資料，如果存在就覆蓋過去。（還是只有一筆資料）。
  PATCH：附加新的資料在已經存在的資料後面。（資料必須已經存在，patch 會擴充這項資料）
  DELETE：刪除資料。

  假設現在我們要點餐，我們必須先知道菜單是甚麼（get），
  我們會向服務生點餐（post），
  我們想要取消剛才點的餐點（delete），
  我們想要重新點一次（put），
  我們想要加點甜點和飲料（patch）。

  （以上是網路上找到的資料）
4. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
  GET會把要傳送的資料包含在網 址列裡面，例如 google 搜尋時網址列會出現 "search?q=....."
  POST則是會把要傳送的資料包含在 request 裡面。

5. 什麼是 RESTful API？
  RESTFUL 是 Representational State Transfer 的縮寫，是一種網站設計的標準，沒有硬性規定。
  REST API 充分的使用了 HTTP 的 Method 達到直觀簡潔的 URI 、善用 HTTP Verb達到對資源的操作。

6. JSON 是什麼？
  JSON 是資料儲存的格式，方便處理也容易閱讀。格式類似以下：
  {
  "firstName": "Peter",
  "lastName": "Xu",
  "sex": "male",
  "age": 25,
  }

7. JSONP 是什麼？
  JASONP 是一種利用 <script> 標籤的特性，讓網頁可以繞過 Same Origin Policy 來得到 response 的資料。

8. 要如何存取跨網域的 API？
  透過 script 的 src 直接將資料塞進去, 這種方法就可以由多個不同網域直接取得資料, 不過寫法會有點不同, 格式要是 JSON 或 Javascript code 的格式