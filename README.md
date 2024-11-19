### 資策會前端工程師就業養成班期中作業  
## PHP製作網站後台  

  #一、 基本列表呈現    
    -從資料表中選擇所有欄位。$SQL=SELECT * FROM table;  
    -透過query() 直接執行 SQL，用fetchAll()從 PDOStatement 對象中提取所有查詢結果。$rows = $pdo->query($sql)->fetchAll();  
   
1. 未登入列表畫面  
  ![image](https://github.com/yhn2983/php_list/blob/main/%E7%99%BB%E5%85%A5%E5%89%8D%E5%88%97%E8%A1%A8.png)
   
 2.登入後列表畫面    
  ![image](https://github.com/yhn2983/php_list/blob/main/%E7%99%BB%E5%85%A5%E5%BE%8C%E5%88%97%E8%A1%A8.png)  
  3.搜尋列表與排序功能  
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
