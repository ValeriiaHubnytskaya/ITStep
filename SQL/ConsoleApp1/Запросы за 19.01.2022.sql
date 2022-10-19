-- БЫЛИ ИЗМЕНЕНИЯ В "ПРАЙСЕ"
-- 1. СОЗДАЕМ ТАБЛИЦУ 
	-- АККУМУЛЯТОР, ХРАНЯЩУУЮ ДАННЫЕ ОБ ИЗМЕНЕНИЙ ТАБЛИЦЫ PRODUCTS
--CREATE TABLE AccProducts (
--	IsChanged INT)

-- 2. УСТАНАВЛИВАЕМ НАЧАЛЬНОЕ ЗНАЧЕНИЕ - 0
--INSERT INTO AccProducts VALUES (0)

-- 3. ТРИГГЕРЫ, КОНТРОЛИРУЮЩИЙ ИЗМЕНЕНИЯ В PRODUCTS 
--CREATE TRIGGER
--	OnProductChange		-- иМЯ ТРИГГЕРА
--ON
--	Products						-- ТАБЛИЦА, В КОТОРОЙ ВОЗНИКАЮТ СОБЫТИЯ
--AFTER							--INSTEAD OF / ДО ИЛИ ПОСЛЕ ИЗМЕНЕНИЯ 
--	INSERT, DELETE, UPDATE	-- КОНТРОЛИРУЕМЫЕ МОБЫТИЯ
--AS
--BEGIN
--	SET NOCOUNT ON 
--	-- МЕНЯЕМ В АККУМУЛЯТОРЕ ЗНАЧЕНИЕ ISCHANGE
--	UPDATE AccProducts SET IsChanged = 1
--END

--АККУМУЛЯТОР ПРОДАЖ - ЗА ВСЮ ИСТОРИЮ 
-- 1. СОЗДАЕМ ТАБЛИЦУ 
-- CREATE TABLE AccSales (TotalMoney INT, TotalPcs INT)

-- 2. НАЧАЛЬНЫЕ ЗНАЧЕНИЯ
--INSERT INTO
--	AccSales(
--		TotalMoney, 
--		TotalPcs)
--SELECT 
--	SUM(S.Cnt * P.Price),
--	SUM(S.Cnt)
--FROM
--	Sales S 
--	JOIN Products P ON S.ID_product = P.Id

-- 3 ТРИГГЕР 
--CREATE TRIGGER 
--	OnSalesInsert
--ON
--	Sales
--AFTER
--	iNSERT
--AS
--BEGIN
--	SET NOCOUNT ON
--	DECLARE @C  INT
--	DECLARE @C2  INT
--	SET @C = (SELECT TotalPcs FROM AccSales)
--	SET @C2 = (SELECT Cnt FROM inserted)

--	DECLARE @m  INT
--	DECLARE @m2  INT
--	SET @m = (SELECT TotalMoney FROM AccSales)
--	SET @m2 = (SELECT sum(I.Cnt * P.Price) FROM inserted I JOIN Products P ON I.ID_product = P.Id)
--	SET @m += @m2

--	UPDATE AccSales SET TotalPcs = @c, TotalMoney = @m

--END

	

