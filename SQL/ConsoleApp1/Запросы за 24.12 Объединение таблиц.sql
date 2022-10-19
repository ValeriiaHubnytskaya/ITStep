--НАЗВАНИЕ ОТДЕЛА (ПО АЛФАВИТУ) - ФИО СОТРУДНИКА (ПО АЛФАВИТУ)
--SELECT 
--		D.Name [Отдел]
--		M.Name +  '   ' +  M.Surname "ФИО",
--		
--FROM
--		Managers M
--		JOIN Departments D ON M.Id_main_dep = D.Id
--ORDER BY 
--1,2

--Название сотрудника ( по алфавиту) - Навзание отдела (основной) - по совместительству
--SELECT 
	
--		M.Name +  '   ' +  M.Surname "ФИО"	,
--		D.Name[Отдел основной],
--		SD.Name[Отдел по совместительству]
--FROM
--		Managers M
--		JOIN Departments D ON M.Id_main_dep = D.Id		
--		LEFT JOIN Departments SD ON M.Id_sec_dep = SD.Id		
--ORDER BY 
--M.Surname

----ФИО сотрудника - ФИО начальника по (id_chief)
--SELECT 
	
--		M.Surname + '    ' +  M.Name+ '(' + D.Name + ')'
--		AS [Сотрудник] ,
--		COALESCE(Chief.Name + '   ' + Chief.Surname + '(' + DC.Name +  ')', '- - - -')
--		AS [Начальник]
--FROM
--		Managers M
--		LEFT Join Managers Chief On M.Id_chief = Chief.Id
--		Join Departments D ON M.Id_main_dep = D.Id
--		 LEFT Join Departments DC ON Chief.Id_main_dep = DC.Id

--Продажи за 24.12:
--Время (последние сначала) - Название товара - штук
--SELECT 
--	 p.Id[ID],
--	p.Name[Название],
--	S.Cnt[кОЛ-ВО]
--FROM 	
--	Sales S	
--   JOIN Products P ON P.Id = S.ID_product
--WHERE
--	CAST(S.Moment AS DATE) = '2020-12-24'
--	ORDER BY
--	CAST(S.Moment AS TIME) desc

--ФИО (по алфавиту) - название товара - штук
--Время (по возрастанию) - сумма чека
--SELECT
--	M.Name + '    ' + M.Surname + '   ' + M.Secname [ФИО],
--	P.Name[Название],
--	S.Cnt[кОЛ-ВО]
--FROM
--Managers M
--JOIN Sales S ON S.ID_manager = M.Id
--JOIN Products P ON P.Id = S.ID_product
--WHERE
--	CAST(S.Moment AS DATE) = '2020-12-24'
--	ORDER BY
--	CAST(S.Moment AS TIME)asc,
--	1 asc

--Название отдела (из которого менеджер) -  Название товара - штук
--Название отдела (из которого менеджер) -  Название товара - сумма чека
SELECT
	D.Name[ОТДЕЛ],
	P.Name[Название],
	S.Cnt[кОЛ-ВО],
	SUM (S.Cnt * P.Price) AS [СУММА ЧЕКА]
FROM
Departments D
JOIN Sales S ON D.Id = S.ID_manager
JOIN Products P ON P.Id = S.ID_product
WHERE
	CAST(S.Moment AS DATE) = '2020-12-24'

	
