--ID СОТРУДНИКА - КОЛ-ВО ЧЕКОВ - КОЛ-ВО ТОВАРОВ (ЗА СЕГОДНЯ)
--SELECT
--		S.ID_manager,
--		COUNT(S.Id) AS Checks,
--		SUM(S.cnt) AS Psc
--FROM
--	Sales S
--WHERE
--CAST(S.Moment AS DATE) = '2020-01-12'
--GROUP BY
--	S.ID_manager

	--ФИО  СОТРУДНИКА - КОЛ-ВО ЧЕКОВ - КОЛ-ВО ТОВАРОВ (ЗА СЕГОДНЯ) 
					--ВАРИАНТ 1
--	SELECT
--		S.ID_manager,
--		MAX(CONCAT(M.Surname, '  ', M.Name) )AS [ФИО],
--		COUNT(S.Id) AS Checks,
--		SUM(S.cnt) AS Psc
--FROM
--	Sales S
--	JOIN Managers M ON M.Id = S.ID_manager
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-12'
--GROUP BY
--	S.ID_manager

		--ВАРИАНТ 2			ПЛОХОЙ: ОБЪЕДИНЯЮТСЯ ОДНОФАМИЛЬЦЫ ПО ВЫЧИСЛЯЕМОМУ ПОЛЮ
--	SELECT		
--		CONCAT(M.Surname, '  ', M.Name) AS [ФИО],
--		COUNT(S.Id) AS Checks,
--		SUM(S.cnt) AS Psc
--FROM
--	Sales S
--	JOIN Managers M ON M.Id = S.ID_manager
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-12'
--GROUP BY
--	CONCAT(M.Surname, '  ', M.Name) 

		--В ВАРИАНТЕ 1: СНАЧАЛА СОЕДИНЯЮТСЯ ТАБЛИЦЫ, ЗАТЕМ ГРУППИРУЮТСЯ
		-- ВАРИАНТ 3: СНАЧАЛА ГРУППИРУЕМ SALES, ЗАТЕМ РЕЗУЛЬТАТ ОБХЕДИНЯЕМ С MANAGERS
	--
		--ВАРИАНТ 3
--		SELECT 
--		CONCAT(M.Surname, '  ', M.Name) AS [ФИО],
--		DailyStat.Checks,
--		DailyStat.Psc
--		FROM
--(	SELECT
--			S.ID_manager,	
--			COUNT(S.Id) AS Checks,
--			SUM(S.cnt) AS Psc
--	FROM
--		Sales S
--	WHERE
--		CAST(S.Moment AS DATE) = '2020-01-12'
--	GROUP BY
--		S.ID_manager
--)AS DailyStat
--JOIN Managers M ON M.Id = DailyStat.ID_manager

--ВЫВЕСТИ ЗА СЕГОДНЯ 
-- НАИМЕНОВАНИЕ ТОВАРА - КОЛ-ВО ШТУК
--SELECT
--	P.Name,
--	TMP.Psc
--FROM
--(SELECT
--	s.ID_product,
--	SUM(S.Cnt) AS Psc
--FROM
--	Sales S
--	JOIN Products P ON p.Id = S.ID_product
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-10'
--	AND CAST(S.Moment AS TIME) BETWEEN '10:00' AND '11:00'
--GROUP BY
--	S.ID_product
--) AS	TMP
--JOIN Products P ON P.Id = TMP.ID_product

			-- ВСЕ ИЗ ТАБЛИЦЫ
--SELECT
--	P.Name,
--	COALESCE(CAST(TMP.Psc AS CHAR), ' - ')
--FROM
--(SELECT
--	s.ID_product,
--	SUM(S.Cnt) AS Psc
--FROM
--	Sales S
--	JOIN Products P ON p.Id = S.ID_product
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-10'
--	AND CAST(S.Moment AS TIME) BETWEEN '10:00' AND '11:00'
--GROUP BY
--	S.ID_product
--) AS	TMP
-- RIGHT JOIN Products P ON P.Id = TMP.ID_product

--ФИО - КОЛ-ВО ЧЕКОВ (ДЛЯ ВСЕХ СОТРУДНИКОВ, У КОГО НЕТ ПРОДАЖ УКАЗАТЬ "-")
--SELECT
--	M.Name + '   ' + m.Surname,
--	COALESCE(CAST(FIO.Psc AS CHAR), ' - ')
--FROM
--(SELECT
--	s.ID_manager,
--	sum (S.Cnt) AS Psc
--FROM
--	Sales S
--	JOIN Managers M ON M.Id = s.ID_manager
--WHERE
--	CAST(S.Moment AS DATE) = '2020-01-10'
--	AND CAST(S.Moment AS TIME) BETWEEN '10:00' AND '11:00'
--	GROUP BY
--	S.ID_manager
--) AS FIO
-- RIGHT JOIN Managers M ON M.Id = FIO.ID_manager


	--НАИМЕНОВАНИЕ ТОВАРА - КОЛ-ВО ПРОДАЖ ДЛЯ ВСЕХ.


	--ТРИ САМЫХ ПРОДАВАЕМЫХ ТОВАРА
	SELECT TOP 3
	P.Name,
	Tmp.Psc
From
	Products P
	JOIN (
		SELECT 
				S.Id_product,
				SUM(S.Cnt) AS Psc
			FROM
				Sales S
			WHERE
				CAST(S.Moment AS DATE) = '2020-01-10'
			GROUP BY 
				S.ID_product
	)AS Tmp
 ON P.Id = Tmp.ID_product
ORDER BY
	2 desc
