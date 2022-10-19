	-- Имя сотрудника - фамилия (имена по алфавиту)
	/*
	SELECT
	M.Id AS Num,			
	M.Name AS [Имя],
	M.Surname AS [Фамилия]
	FROM
	Managers AS M			
	ORDER BY
	1 ASC
	*/

	-- Сотрудников ФИО работающих не в бухгалтерии

	SELECT 
	M.Id AS Num,								
	M.Surname AS [Фамилия],				
															
	CONCAT(M.Name, '   ', M.Secname)  
			[Имя, Отчество]						
FROM
	Managers AS M								
WHERE 
M.Id_main_dep != (								
		SELECT 
			D.Id
		FROM
			Departments D						
		WHERE
			D.Name = N'Бухгалтерия'
)
	

	-- Продажи (все, *) за 22.12 в календарном порядке
	

