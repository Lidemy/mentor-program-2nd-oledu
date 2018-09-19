## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
- <hr>	在螢幕畫出一條滿版橫線，可以在 style中用css控制他的特性
- <em>	把文字變粗體，可以穿插在其他 tag 中
- <i> 把文字變斜體，可以穿插在其他 tag 中
- <button>  創造一個按鈕，例如提交，取消輸入等等
- <form> 建立HTML表格給使用者輸入，可以設定各種條件阻擋錯誤的格式
## 請問什麼是盒模型（box modal）
box model 中文是盒子模型，用來描述一個元素如何組成，其中有三個屬性：控制內距padding, 控制外距的 margin, 和控制元素邊框的border。
## 請問 display: inline, block 跟 inline-block 的差別是什麼？
- inline: inline 元素連再一起的時候不會換行，沒有 margin-top(bottom), padding-top(bottom)指令。
- block: 不管什麼元素碰到block 元素歐會換行，可以設定 width, height, padding, margin...
- inline-block: inline-block元素不會換行，但是可以設定 padding-top(bottom), margin-top(bottom)等指令，類似對內是 block，對外是 inline 的感覺。
## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
- position: static 是預設值，該元素不會被特別定位，而會照著瀏覽器的自動排版顯示。
- position: relative 不提供額外屬性的時候跟 static 一模一樣：若提供額外屬性則會做出相對於原本位置的改變。
- position: fixed 利用瀏覽器的絕對位置來定位，不管畫面項下或向上捲動，該元素還是會在原地。
- position: absolute 有點類似 fixed 用瀏覽器視窗來定位，而 absolute 元素會利用最近一層可被定位的元素來定位（除了 static ，其他都算可被定位元素）。
