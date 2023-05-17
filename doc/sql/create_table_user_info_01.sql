CREATE TABLE user_info(
	u_no INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(12) NOT null
	,u_pw VARCHAR(512) NOT null
	,u_name VARCHAR(30) NOT NULL
	,u_phone_num VARCHAR(11) NOT NULL
	,u_from_date DATE NOT NULL
	,u_del_flg CHAR(1) DEFAULT 0
	,u_to_date DATE NULL
);
COMMIT;