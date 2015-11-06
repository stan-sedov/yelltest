SELECT type,
	   value
  FROM data AS d
 WHERE date = ( SELECT MAX(date)
		          FROM data
		         WHERE type = d.type );