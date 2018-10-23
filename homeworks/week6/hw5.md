## 請說明 SQL Injection 的攻擊原理以及防範方法

SQL injection 是用在使用者的輸入可以直接影響 SQL 文字的時候。
例如 加上 'or 1=1' 可以選擇資料庫的所有物件。
    加上 '; SQL' 可以新增 SQL 指令。

防範方法： 
- 驗證輸入的內容，過濾惡意的程式碼攻擊
- 限制輸入長度
- 資料庫設定使用者帳號權限

## 請說明 XSS 的攻擊原理以及防範方法

XSS  Cross-Site Scripting 跨網站指令碼
透過網頁讀取時，執行攻擊者提供的程式碼，用來竊取資料或是控制網站等等。
對網頁開發人員是比較好防範的攻擊。

防範方法：
- stored XSS 和 reflected XSS 使用跳脫字元即可防範，比較接近後端的範圍。
- DOM-Based XSS 得防範必須透過前端來防飯，例如使用 innerText 而不是 innerHTML 來避免輸入被解析成 DOM 物件。

## 請說明 CSRF 的攻擊原理以及防範方法

CSRF （Cross-site request forgery）的精髓是在不同 domain 底下，卻能製造出使用者本人發出的 request。
比較簡單的理解方法是攻擊者透過使用者點擊連結，並且仍在某個網站維持“登入狀態”的狀況下，在該連結送出不管是 POST、GET 或是 JSON 的 request 來達成入侵網站的目的。

防範方法：
- 在點擊不明連結前都先登出網頁
- 在後端擋住從其他網域來的 request 或是檢查網域的合法性
- 設定 CSRF token，設定一組隨機的亂數分別儲存在 sever 和 form 裡面，在別人接收表單時，就可以知道這個表單是不是自己做的。
- Double Submit Cookie，與上一種相似，不過是把亂碼儲存在 cookie 和 form 中。

## 請舉出三種不同的雜湊函數

雜湊函數（hash function）是一種將不固定長度的輸入，透過演算法輸出成固定場度的雜湊值。具有兩個特點
- 無法透過擦揍直算出元本的訊息
- 不同的輸入要有不同的輸出
而因為無限的輸入產生有限的輸出，有時候雜湊值會碰撞（collision）。
相關的 Unkeyed cryptographic hash functions 有 SHA家族、MD 家族、BLAKE 家族等等。

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別

做完 week6 作業後，再來了解 session 和 cookie 好像有理解的更清楚一點點了，但是其實也還是不知道有沒有正確地使用它。

由於需要記錄特定使用者的特定行為，cookie 和 session 的產生是為了繞過 http '無狀態'協議。

cookie 常用來識別用戶，透過將 cookie 儲存在 client ，client 在每次在請求網頁時，同時會送出 cookie ，server 再透過 PHP 來取得 cookie 的資訊。

session 也可以用來記錄不同使用者的狀態，網站開發者可以在可以為 client 的請求創建 session，如果 client 帶著 database 裡面有的 session_id 代表他是之前某個使用者，server 可以取出她之前的記錄；而如過是帶著新的 session_id 代表他是新的使用者。這個 session_id 可以儲存在 cookie 或者是透過 URL 進行傳遞。

這次的作業我利用 username 和 session_id 綁在一起傳給 cookie，來判斷登入狀態。如果有人試圖仿造 cookie 會很困難，因為沒有對應的資料，而登出的時候就把 session_id 和 username 的連結從資料庫刪除，當瀏覽器下次再以同樣的 cookie 請求時就不會判斷為登入狀態。


## `include`、`require`、`include_once`、`require_once` 的差別

`include` 、 `include_once` 、`require` 和 `require_once` 都是用來引入檔案。
不同的是 `include` 系列的引入搜尋不到檔案會產生錯誤，但不會停止程式執行；而 `require` 系列的引入搜尋不到檔案會產生錯誤而且停止程式執行。而`once`代表只會引入一次，不會重複引入。