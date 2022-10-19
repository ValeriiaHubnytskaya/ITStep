	INSERT INTO Sales 
		( Id_manager, Id_product, Moment, Cnt)
	VALUES
	(
		( SELECT TOP 1 Id FROM Managers ORDER BY NEWID() ),				-- random ID from Manager
		('da1e17bb-a90d-4c79-b801-5462fb070f57'),
		('2020-01-01'													-- base date - first day in year
			+ DATEADD( day,    ( ABS( CHECKSUM( NEWID() ) ) % 365 ), 0) -- random day - one from 365
			+ DATEADD( hour,   ( ABS( CHECKSUM( NEWID() ) ) % 24  ), 0) -- random hour - one from 24
			+ DATEADD( minute, ( ABS( CHECKSUM( NEWID() ) ) % 60  ), 0) -- random minute - one from 60
		),
		( 10 )							-- random Cnt: 1 to 10
	)