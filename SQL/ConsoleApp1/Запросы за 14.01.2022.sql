--SELECT
--		M.Id_main_dep,
--		SUM(P.Price * S.Cnt),
--		MIN(D.Name)
--FROM
--		Sales S
--		JOIN Products P ON S.Id_product = P.Id
--		JOIN Managers M ON S.ID_manager = M.Id
--		JOIN Departments D ON M.Id_main_dep = D.Id
--GROUP BY
--		M.Id_main_d

--DECLARE @today DATE
--SET @today = '2020-01-14' --переменные
--SELECT
--		MIN(D.Name),
--		SUM(P.Price * S.Cnt)	
--FROM
--		Sales S
--		JOIN Products P ON S.Id_product = P.Id
--		JOIN Managers M ON S.ID_manager = M.Id
--		JOIN Departments D ON M.Id_main_dep = D.Id
--WHERE
--		S.Moment BETWEEN @today AND DATEADD(day, 1, @today)
--GROUP BY
--		M.Id_main_dep
--HAVING
--			SUM(P.Price * S.Cnt)	 > 5000 
--			or
--			SUM(P.Price * S.Cnt)	 > 30000 
--ORDER BY
--	2

--SELECT
--*
--FROM
--(SELECT
--	P.*,
--	ROW_NUMBER() OVER (ORDER BY Id) AS r_num
--FROM
--	Products P
--	)AS Tmp
--	WHERE
--	r_num > 6
--	AND
--	r_num <= 12


--DECLARE @page INT
--DECLARE @perpage INT
--SET  @page = 2 --первая страница, не (0)
--SET   @perpage = 6

--SELECT
--	P.*
--FROM
--	Products P
--ORDER BY
--	P.Id
--OFFSET  @perpage * (@page - 1)  ROWS
--FETCH NEXT  @perpage ROWS ONLY


DECLARE @page INT
DECLARE @perpage INT
SET  @page = 2 --первая страница, не (0)
SET   @perpage = 6

SELECT
	P.*
FROM
	Products P
ORDER BY
	P.Id
OFFSET 0 ROWS
FETCH NEXT  @perpage ROWS ONLY