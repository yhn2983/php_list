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
    在SQL語句中對多個欄位進行比對，並以?作佔位。  
    $stmt = $pdo->prepare($sql);以prepare() 防止 SQL 注入。  
    $stmt->bindValue(1, $keyword, PDO::PARAM_STR);用bindValue() 用來將值與 SQL 中的佔位符關聯，並指定類型為 PDO::PARAM_STR。  
    用execute() 方法執行準備好的 SQL。  
    最後透過$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);取得結果。  
        
   ![image](https://github.com/yhn2983/php_list/blob/main/search.gif)     
   4.頁碼功能    

  --定義每頁筆數：設定每頁顯示的記錄數（如 10 筆）。$perPage = 10;  
  --計算總記錄數：從資料庫查詢 order_fake 表的總筆數。$total_sql = "SELECT COUNT(1) FROM order_fake ";/$total_rows = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0];   
  --計算總頁數：依據總記錄數和每頁筆數，計算分頁所需的總頁數。$total_pages = ceil($total_rows / $perPage);  

  --根據選擇的頁數來決定SQL語句要取得並呈現的資料筆數。"SELECT * FROM order_fake order by id desc LIMIT %s, %s", ($page - 1) * $perPage, $perPage);  
         
  ![image](https://github.com/yhn2983/php_list/blob/main/page.gif)  
   
  二、CRUD功能   
  1.新增    

  --定義一條 SQL 語句，用於向 product 資料表插入一條新的記錄，用"?"作為佔位符，用於防止 SQL 注入。$sql = "INSERT INTO `table`(`th1`, `th2`, `th3`, `th4` ) VALUES (?,?,?,?)";    
  --使用 PDO 的 prepare() 方法準備執行 SQL 語句。$stmt = $pdo->prepare($sql);  
  --使用 execute() 方法執行準備好的 SQL 語句，並傳入對應的值，傳入的數據將依次替換語句中的"?"。$stmt->execute([ $_POST['name1'], $_POST['name2'], $_POST['name3'],$_POST['name4'],]);   
    
 ![image](https://github.com/yhn2983/php_list/blob/main/create.gif)    
   
  2.刪除      

--當點擊刪除鈕後，會連結到"del.php?sid=${sid}"，透過 SQL 語句"DELETE  FROM `table` WHERE id=$sid"，用於從資料表中刪除一條資料。使用 PDO 的 query() 方法執行上述 SQL 語句。
        
  ![image](https://github.com/yhn2983/php_list/blob/main/delete.gif)    
    
  3.編輯   

--$sql="UPDATE `table` SET `th_name`=?"; 定義一條SQL UPDATE語句，用於更新資料表中的記錄。     
  
--使用 PDO 的 prepare() 方法準備執行 SQL 語句，並使用 execute() 方法執行準備好的 SQL 語句。  
  
        
   ![image](https://github.com/yhn2983/php_list/blob/main/edit.gif)  
  
  三、登入登出  

  ![image](https://github.com/yhn2983/php_list/blob/main/loginout.gif)
