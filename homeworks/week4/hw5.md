1. 什麼是 DOM？
  DOM 建立起網頁與程式語言互動的橋樑，把 HTML 文件結構化，並讓 Script 文件可以存取及改變網頁的內容和風格。

2. 什麼是 Ajax？
  Ajax (Asynchronous 非同步 JavaScript and XML) 是一種讓網頁不必重新讀取就可以送出 request 的技術。

3. HTTP method 有哪幾個？有什麼不一樣？


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
