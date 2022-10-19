CREATE TABLE literals(
id											--ИМЯ
UNIQUEIDENTIFIER		-- ТИП ДАННЫХ
PRIMARY KEY					--МОДИФИКАТОР
DEFAULT NEWID(),			-- ЗНАЧЕНИЕ ПО УМОЛЧАНИЮ

num_value 
INT										--ЦЕЛОЕ
NOT NULL,						--null не разрешается

txt_value
NVARCHAR(128)				
NULL,									-- можно не писать, это по умолчанию

moment
DATETIME
DEFAULT CURRENT_TIMESTAMP
);