-- 在既有資料庫上執行：為 members 資料表加上 role 欄位（admin / member，預設 member）
ALTER TABLE `members`
  ADD COLUMN `role` varchar(20) NOT NULL DEFAULT 'member' AFTER `password`;

-- 指定管理員帳號（請把 email 換成你要當管理員的帳號）
UPDATE `members` SET `role` = 'admin' WHERE `email` = 'kim@nuuc.edu';
