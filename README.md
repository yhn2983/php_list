## 資策會前端工程師就業養成班期中作業  
### PHP製作網站後台  

#### 一、 基本列表呈現    
    -從資料表中選擇所有欄位。$SQL=SELECT * FROM table;  
    -透過query() 直接執行 SQL，用fetchAll()從 PDOStatement 對象中提取所有查詢結果。$rows = $pdo->query($sql)->fetchAll();  
   
1. 未登入列表畫面  

   --若無登入，則導入未登入的頁面，透過isset($_SESSION())判斷有無登入  
   
  ![image](https://github.com/yhn2983/php_list/blob/main/%E7%99%BB%E5%85%A5%E5%89%8D%E5%88%97%E8%A1%A8.png)
   
 2.登入後列表畫面    

  --若有登入，則導入登入後的頁面，透過isset($_SESSION())判斷有無登入    
    
  ![image](https://github.com/yhn2983/php_list/blob/main/%E7%99%BB%E5%85%A5%E5%BE%8C%E5%88%97%E8%A1%A8.png)    
  
  3.搜尋列表與排序功能    

  --透過條件判斷式來判斷以何種SQL語法讀取並排序資料庫資料  
  
  --處理搜尋功能，先透過isset($_GET["keyword"]) && $_GET["keyword"] != ""： 確保關鍵字參數存在且非空，避免處理無效查詢。  
  $keyword = "%" . $_GET["keyword"] . "%";用以模糊查詢。    
  在SQL語句中對多個欄位進行比對，並以?作佔位。  $stmt = $pdo->prepare($sql);以prepare() 防止 SQL 注入。  
  $stmt->bindValue(1, $keyword, PDO::PARAM_STR);用bindValue() 用來將值與 SQL 中的佔位符關聯，並指定類型為 PDO::PARAM_STR。  
  用execute() 方法執行準備好的 SQL。  
  最後透過$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);取得結果。  
        
   ![image](https://github.com/yhn2983/php_list/blob/main/search.gif)     
   4.頁碼功能  
      ![image](https://github.com/yhn2983/php_list/blob/main/page.gif)  
   
  二、CRUD功能   
  1.新增  
 ![image](https://github.com/yhn2983/php_list/blob/main/create.gif)  
  2.刪除    
  ![image](https://github.com/yhn2983/php_list/blob/main/delete.gif)  
  3.編輯   
   ![image](https://github.com/yhn2983/php_list/blob/main/edit.gif)  
  
  三、登入登出  

  ![image](https://github.com/yhn2983/php_list/blob/main/loginout.gif)
