 --1.  Вывести сотрудников, у которых есть начальники
		--сотрудник(ФИО) - начальник (ФИО)
--SELECT 	
--		M.Surname + '    ' +  M.Name+ '(' + D.Name + ')'
--		AS [Сотрудник] ,
--		COALESCE(Chief.Name + '   ' + Chief.Surname + '(' + DC.Name +  ')', '---------')
--		AS [Начальник]
--FROM
--		Managers M
--		LEFT Join Managers Chief On M.Id_chief = Chief.Id
--		Join Departments D ON M.Id_main_dep = D.Id
--		 LEFT Join Departments DC ON Chief.Id_main_dep = DC.Id

--2.  Вывести сотрудников (Ф.И.О.), у которых нет начальников
--SELECT
-- M.Surname + ' ' + M.Name
-- AS [Сотрудник]
--FROM
--  Managers M
--WHERE
-- M.Id_chief IS NULL

--3.  Вывести начальников:
--     сотрудник (Ф.И.О.) - количество его прямых подчиненных
--     (если нет подчиненных, то не включать в вывод)
		--SELECT
		--		Cheif.Name + ' ' + Cheif.Surname  + ' '  + Cheif.Secname  AS [FIO Cheif],
		--		COUNT( M.Name + ' ' + M.Surname  + ' '  + M.Secname ) AS [FIO M]
		
		--FROM
		--Managers M
		--JOIN Managers Cheif ON M.Id_chief = Cheif.Id

		--GROUP BY
		--	Cheif.Name + ' ' + Cheif.Surname  + ' '  + Cheif.Secname 

		--ORDER BY 1

--4.  Вывести название отдела - количество сотрудников,
--     которые работают на основном месте  
	--SELECT
	--	D.Name AS[NAME],
	--	COUNT(M.Name) AS [PCS]
	--FROM
	--Departments D
	--JOIN Managers M ON M.Id_main_dep = D.Id
	--GROUP BY
	--D.Name
	--ORDER BY 1

--5.  Вывести название отдела - полное количество сотрудников,
--     включая совместителей
	--SELECT
	--D.Name AS[NAME],
	--COUNT(M.Name) AS [PCS]
	--FROM
	--Departments D
	--JOIN Managers M ON D.Id = M.Id_main_dep 
	--JOIN Managers M1 ON  D.Id = M1.Id_sec_dep
	--WHERE
	--M.Id_main_dep = D.Id
	--OR
	--M1.Id_sec_dep = D.Id
	--GROUP BY
	--D.Name


--6.  Вывести 5 лучших по продаже товаров (в штуках)
--     за первый квартал года (январь-февраль-март)
--SELECT TOP 5
--	P.Name,
--	Tmp.Psc
--From
--	Products P
--	JOIN (
--		SELECT 
--				S.Id_product,
--				SUM(S.Cnt) AS Psc
--			FROM
--				Sales S
--			WHERE
--				S.Moment BETWEEN '2020-01-10' AND DATEADD(MONTH, 3, '2020-01-10') 
--			GROUP BY 
--				S.ID_product
--	)AS Tmp
-- ON P.Id = Tmp.ID_product
--ORDER BY
--	2 desc

--7. Вывести товары, которые в январе продавались
     --хуже среднего (суммы общих продаж в деньгах меньше,
     --чем средняя сумма за месяц)
-- SELECT
--	SUM(S.Cnt) AS PCS
--FROM 
--	Sales S
--WHERE 
--	MONTH(S.Moment) = 1 
--GROUP BY
--	S.ID_product
--HAVING
--	 SUM(Cnt) <
--	 (	 
--		 SELECT
--			 AVG(Tmp.Pcs) AS [AVERAGE]
--		 FROM
--			 (
--				SELECT 
--						SUM(S.cnt) AS Pcs
--				FROM
--						Sales S	
--				WHERE
--						MONTH (s.Moment) = 1
--				GROUP BY
--						S.ID_product) AS Tmp
--)

--8.  Вывести сотрудников, которые ничего не продавали
--     за определенный период ( с 10:00 до 11:00 "сегодня" )
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

 
--9. Определить какой товар продавался чаще всего (по
-- количеству чеков). Если таких товаров несколько,
-- вывести все
--SELECT TOP 1
-- MAX(P.Name) AS N'Название товара',
-- COUNT(ID_product) AS N'Количество продаж'
--FROM
-- Products P
-- JOIN Sales S ON S.ID_product = P.Id
--GROUP BY
-- P.Id
-- ORDER BY 
-- 1 DESC

--10. Вывести название отдела, в котором больше всего
--     совместителей. Если таких отделов несколько,
--     выводится первый по алфавиту	
--SELECT TOP 1
--    MAX(D.Name) [Department],
--    COUNT(*) [Count]
--FROM
--    Managers M
--    JOIN Departments D ON M.Id_sec_dep = D.Id
--GROUP BY 
--    D.Id
--ORDER BY
--2 DESC

--11. Вывести помесячную статистику по отделу продаж:     
--     номер месяца - сумма продаж

----12. Вывести название отдела - сотрудников (Ф.И.О.),
--     сначала основных (по алфавиту), 
--     затем совместителей (по алфавиту) 
SELECT
	
FROM
	
(SELECT
	M.Name + '  ' + M.Surname + '   ' + M.Secname AS [FIO]
	
FROM
Managers M
JOIN Departments D ON M.Id_main_dep = D.Id
JOIN Departments DM ON M.Id_sec_dep = DM.Id

 WHERE
 M.Id_main_dep = D.Id
OR
M.Id_sec_dep = DM.Id) AS TMP

ORDER BY 


