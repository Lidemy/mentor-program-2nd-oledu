資料庫名稱：comments

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id | integer | 系統產生的編號 |
| nickname | varchar | 名字 |
| parent_id| integer | 主留言 parent_id = 0；子留言則為主留言的id|
| content | varchar |  留言內容 |
| time | datetome | 留言時間 |
