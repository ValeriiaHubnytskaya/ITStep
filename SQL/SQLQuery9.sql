--ВЫБОРКА ДАННЫХ
SELECT 
	M.Id AS Num,									--Обращение по псевдониму
	M.Surname AS [Фамилия],				-- псевдоним для поля
															--[] для имен не как переменная
	CONCAT(M.Name, '   ', M.Secname)  -- Состовное поле / функция
			[Имя, Отчество]						-- AS не обязательно
FROM
	Managers AS M								--Псевдоним таблицы (для кратности)
WHERE 
M.Id_main_dep = (								-- Условие (вложенный запрос/подзапрос)
		SELECT 
			D.Id
		FROM
			Departments D						-- AS не обязательно
		WHERE
			D.Name = N'Бухгалтерия'
)
OR														-- Логическое ИЛИ
M.Id_sec_dep =
(
	SELECT 
		D.Id
	FROM
		Departments D						-- AS не обязательно
	WHERE
		D.Name = N'Бухгалтерия'
)
ORDER BY										-- СОРТИРОВКА (УПОРЯДОЧИТЬ ПО)
	2													-- НОМЕР ПОЛЯ ПО ВЫБОРКЕ([ФАМИЛИЯ])
