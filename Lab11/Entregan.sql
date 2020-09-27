SET DATEFORMAT dmy

BULK INSERT a1701111.a1701111.[Entregan]
FROM 'e:\wwwroot\rcortese\entregan.csv'
WITH 
(
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
)
