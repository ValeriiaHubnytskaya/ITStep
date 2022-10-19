--SELECT
--*
--FROM 
--Products
--ORDER BY Id
--OFFSET
--(SELECT COUNT(id) FROM Products) /2
--ROWS

--CREATE PROCEDURE  RandProd
--AS
--BEGIN

--SELECT TOP 1 * FROM Products ORDER BY NEWID()

--END


-- EXECUTE RandProd ВЫЗОВ 
-- EXEC RandProd

 --RandProd 3

--ALTER PROCEDURE  RandProd
--@N INT 
--AS
--BEGIN

--SET NOCOUNT ON

--SELECT TOP (@N) * FROM Products ORDER BY NEWID()

--END

--CREATE PROC
--	DailyStatProdM
--	@Day DATETIME, --START
--	@Hours INT				-- INTERVAL
--AS
--BEGIN

--SET NOCOUNT ON --ОТКЛЮЧАЕТ СЧЕТЧИК ЗАДЕЙСТВОВАНЫХ СТРОК

--SELECT
--MAX(P.Name) AS PRODUCT,
--SUM(S.Cnt) AS PCS
--FROM	
--	Sales S
--	JOIN Products P ON S.ID_product = P.Id
--WHERE
--	S.Moment BETWEEN @Day AND DATEADD(HOUR, @Hours, @Day)
--GROUP BY
--P.Id
--END

--EXEC DailyStat '2020-01-17'

 --DECLARE @D DATE
 --SET @D = CAST(DATEADD(YEAR, -2, CURRENT_TIMESTAMP) AS DATE)
 --EXEC DailyStat @D

 --EXEC DailyStatProdM '2020-01-17 12:00', 3

--ALTER PROC
--	DailyStatProdM
--	@Day DATETIME, --START
--	@Hours INT				-- INTERVAL
--AS
--BEGIN

--SET NOCOUNT ON --ОТКЛЮЧАЕТ СЧЕТЧИК ЗАДЕЙСТВОВАНЫХ СТРОК

--SELECT
--MAX(P.Name) AS PRODUCT,
--SUM(S.Cnt) AS PCS
--FROM	
--	Sales S
--	RIGHT JOIN Products P ON S.ID_product = P.Id
--WHERE
--	--S.Moment BETWEEN @Day AND DATEADD(HOUR, @Hours, @Day)	
--	S.Moment BETWEEN '2020-01-17 12:00' AND DATEADD(HOUR, 3, '2020-01-17 12:00')
--	OR S.Moment IS NULL
--GROUP BY
--P.Id
--END


--ALTER PROC
--	DailyStatProdM
--	@Day DATETIME, --START
--	@Hours INT				-- INTERVAL
--AS
--BEGIN

--SET NOCOUNT ON --ОТКЛЮЧАЕТ СЧЕТЧИК ЗАДЕЙСТВОВАНЫХ СТРОК
--SELECT
--P.Name,
--COALESCE(TMP.PCS, 0) AS PCS
--FROM
--(SELECT
--S.ID_product,
--SUM(S.Cnt) AS PCS
--FROM	
--	Sales S	
--WHERE
--	--S.Moment BETWEEN @Day AND DATEADD(HOUR, @Hours, @Day)	
--	S.Moment BETWEEN '2020-01-17 12:00' AND DATEADD(HOUR, 3, '2020-01-17 12:00')
--	OR S.Moment IS NULL
--GROUP BY
--S.ID_product
--) AS TMP
--RIGHT JOIN Products P ON TMP.ID_product = P.Id
--END

 --EXEC DailyStatProdM '2020-01-17 12:00', 3

-- ALTER PROC
--	DailyStatProdM
--	@Day DATETIME, --START
--	@Hours INT				-- INTERVAL
--AS
--BEGIN

--SET NOCOUNT ON --ОТКЛЮЧАЕТ СЧЕТЧИК ЗАДЕЙСТВОВАНЫХ СТРОК
--SELECT
--P.Name,
--COALESCE(TMP.PCS, 0) AS PCS
--FROM
--(SELECT
--S.ID_manager,
--SUM(S.Cnt) AS PCS
--FROM	
--	Sales S	
--	JOIN Managers M ON M.Id = S.ID_manager
--WHERE
--	--S.Moment BETWEEN @Day AND DATEADD(HOUR, @Hours, @Day)	
--	S.Moment BETWEEN '2020-01-17 12:00' AND DATEADD(HOUR, 3, '2020-01-17 12:00')
--	OR S.Moment IS NULL
--GROUP BY
--S.ID_product
--) AS TMP
--RIGHT JOIN Products P ON TMP.ID_product = P.Id
--END

--На Пагинацию:
--Вывести первую половину записей из таблицы (количество заранее не известно)
--CREATE PROCEDURE  
--	PAGEONE
--	@N  INT 
--AS
--BEGIN
--SET NOCOUNT ON
--SELECT TOP (@N / 2) * FROM Products ORDER BY NEWID()
--END

--EXEC PAGEONE 12

--Вывести 3 самых дорогих товара, кроме самого дорогого из всех

--CREATE PROC
--	EXPENSIVE
--AS
--BEGIN
--	SET NOCOUNT ON
--	SELECT TOP 3
--		MAX(P.Name) AS NAME,
--		SUM(S.Cnt * P.Price) AS PCS
--	FROM
--	Sales S
--	JOIN Products P ON S.ID_product = P.Id
--	GROUP BY
--	P.Id
--	ORDER BY
--	2 DESC
--END

--EXEC EXPENSIVE


--На HAVING:
--Вывести товары, которые за сегодня проданы больше, чем средний
-- уровень продаж.

--SELECT 
--	P.Name[NAME],
--	SUM(S.Cnt),
--	AVG(S.Cnt * P.Price)  AS AVERAGE
--FROM
--Sales S
--JOIN Products P ON S.ID_product = P.Id
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-10'
--HAVING
--	AVERAGE <SUM(S.Cnt * p.Price)	

--На оба:
--Вывести вторую тройку лидеров по продажам за сегодня (менеджеров)
--ALTER PROC
--	MANAGER
--AS
--BEGIN
--SET NOCOUNT ON
--	SELECT TOP 4

--	MAX(M.Name + '  ' + M.Surname) AS FIO,
--	SUM(S.Cnt) AS PCS
--	FROM
--		Managers M
--		JOIN Sales S ON M.Id = S.ID_manager
--		JOIN Products P ON S.ID_product = P.Id
--	WHERE
--		CAST(S.Moment AS DATE) = '2020-01-21'
--END

 --EXEC MANAGER

-- Реализовать пагинацию в виде процедур:
--GetProductPage 2  -- вторая страница товаров (по 6 на странице)
--ALTER PROC 
--	GETPRODUCTPAGE2
--AS 
--BEGIN
--	SET NOCOUNT ON
--	SELECT TOP 6
--	P.*
--	FROM Products P

	
--END
  -- EXEC GETPRODUCTPAGE2


--GetDailyChecksPage '2020-01-17', 5  -- 5-я страница чеков за 2020-01-17
--ALTER PROC
--	GETDAILYCHECKSPAGE
--	@day DATE,
--	@N INT
--AS
--BEGIN
--	SET NOCOUNT ON
--	SELECT TOP (@N)
--	MAX(P.Name) AS NAME,
--	SUM(S.Cnt * P.Price) AS PCS
--	FROM
--		Sales S
--		JOIN Products P ON S.ID_product = P.Id
--	WHERE
--	CAST(S.Moment AS DATE) = @day
--	GROUP BY
--	P.Id
--END

-- EXEC GETDAILYCHECKSPAGE '2020-01-17', 5

--Поисковые запросы:
--Товары по фрагменту названия
--Сотрудник - искать и по имени, и по фамилии
--alter proc
--	findfio
--	@name nvarchar(15),
--	@surname nvarchar(20)
--as
--begin
--	set nocount on
--	select
--	count(m.name + m.surname) as fio
--	from
--	managers m
--	where
--	m.name = @name or
--	m.surname = @surname
--end
--EXEC FINDFIO 'Абрам' , 'Шумейко'
--FindProduct N'га'
--Гайка
--Органайзер

--DECLARE @fragment NVARCHAR(max)

--SET @fragment = N'ra'

--SELECT 
--P.*
--FROM 
--Products P
--WHERE
--LOWER(P.Name)
--LIKE
--CONCAT('%', LOWER (@fragment), '%')