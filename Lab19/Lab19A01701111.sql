SELECT * FROM Entregan;
SELECT * FROM Materiales;
/*
Materiales(Clave, Descripción, Costo)
Proveedores(RFC, RazonSocial)
Proyectos(Numero, Denominacion)
Entregan(Clave, RFC, Numero, Fecha, Cantidad)
*/
-- La suma de las cantidades e importe total de todas las entregas realizadas durante el 97. -- 
SELECT sum(Entregan.Cantidad) as Cantidad, sum(Entregan.Cantidad*Materiales.Costo) as Total
FROM Entregan, Materiales
WHERE Entregan.Clave = Materiales.Clave AND Fecha BETWEEN '1997-01-01' AND '1997-12-31';

-- Para cada proveedor, obtener la razón social del proveedor, número de entregas e importe total de las entregas realizadas.
SELECT PRO.RazonSocial, COUNT(EN.RFC) AS 'Numero de entregas', SUM(EN.Cantidad * MA.Costo) AS 'Importe total'	
FROM Proveedores PRO, Entregan EN, Materiales MA
WHERE EN.RFC = PRO.RFC AND EN.Clave = Ma.Clave
GROUP BY PRO.RazonSocial;

-- Por cada material obtener la clave y descripción del material, la cantidad total entregada, la mínima cantidad entregada, la máxima cantidad entregada, el importe total de las entregas de aquellos materiales en los que la cantidad promedio entregada sea mayor a 400.
SELECT MA.Clave AS 'Clave materiales', MA.Descripcion AS 'Descripcion Materiales', SUM(EN.Cantidad) AS 'Cantidad total entregada', MIN(EN.Cantidad) AS 'Minima cantidad entregada', MAX(EN.Cantidad) AS 'Maxima cantidad entregada',	SUM(EN.Cantidad * MA.Costo) AS 'Importe total' 
FROM Materiales MA, Entregan EN
WHERE MA.Clave = EN.Clave
GROUP BY MA.Descripcion, MA.Clave
HAVING AVG(EN.Cantidad) > 400; 

-- Para cada proveedor, indicar su razón social y mostrar la cantidad promedio de cada material entregado, detallando la clave y descripción del material, excluyendo aquellos proveedores para los que la cantidad promedio sea menor a 500.
SELECT PRO.RazonSocial, AVG(EN.Cantidad) AS 'Promedio cantidad material', MA.Clave, MA.Descripcion
FROM Proveedores PRO, Entregan EN, Materiales MA
WHERE PRO.RFC = EN.RFC AND MA.Clave = EN.Clave
GROUP BY MA.Clave, PRO.RFC, PRO.RFC, MA.Descripcion, PRO.RazonSocial
HAVING AVG(EN.Cantidad)<500;

--Mostrar en una solo consulta los mismos datos que en la consulta anterior pero para dos grupos de proveedores: aquellos para los que la cantidad promedio entregada es menor a 370 y aquellos para los que la cantidad promedio entregada sea mayor a 450.
SELECT PRO.RazonSocial, AVG(EN.Cantidad) AS 'Promedio cantidad material', MA.Clave, MA.Descripcion
FROM Proveedores PRO, Entregan EN, Materiales MA
WHERE PRO.RFC = EN.RFC AND MA.Clave = EN.Clave
GROUP BY MA.Clave, PRO.RFC, PRO.RFC, MA.Descripcion, PRO.RazonSocial
HAVING AVG(EN.Cantidad)<370 OR AVG(EN.Cantidad)>450;

-- Utilizando la sentencia ...
INSERT INTO Materiales (Clave, Descripcion, Costo)
VALUES	(1440, 'MINI ARCO ECONOMICO DE 10 PULGADAS', 81),
		(1450, 'DISCO DE CORTE PARA MADERA DE 12 PULGADAS', 619),
		(1460, 'LLAVE DE LAVABO', 695),
		(1470, 'JUEGO DE BROCA SIERRA', 1175),
		(1480, 'CINCEL DE PALA PARA CONCRETO ', 555);

-- Clave y descripción de los materiales que nunca han sido entregados.
SELECT MA.Clave, MA.Descripcion
FROM Materiales MA
WHERE MA.Clave NOT IN (SELECT EN.Clave FROM Entregan EN)

--Razón social de los proveedores que han realizado entregas tanto al proyecto 'Vamos México' como al proyecto 'Querétaro Limpio'.
SELECT PRO.RazonSocial
FROM Proveedores PRO, Entregan EN, Proyectos PRY
WHERE EN.RFC = PRO.RFC AND EN.Numero = PRY.Numero AND EN.Numero =  (SELECT Pr.Numero
																	FROM Proyectos Pr
																	WHERE Pr.Denominacion = 'Queretaro limpio'
																	)
GROUP BY PRO.RazonSocial
UNION
SELECT PRO.RazonSocial
FROM Proveedores PRO, Entregan EN, Proyectos PRY
WHERE EN.RFC = PRO.RFC AND EN.Numero = PRY.Numero AND EN.Numero =  (SELECT Pr.Numero
																	FROM Proyectos Pr
																	WHERE Pr.Denominacion = 'Vamos Mexico'
																	)
GROUP BY PRO.RazonSocial

--Descripción de los materiales que nunca han sido entregados al proyecto 'CIT Yucatán'
SELECT MA.Descripcion
FROM Materiales MA
WHERE MA.Clave NOT IN(
						SELECT EN.Clave
						FROM Proyectos PRY, Entregan EN
						WHERE EN.Numero  = PRY.Numero 
						AND PRY.Denominacion = 'CIT Yucatan'
						)
-- Razón social y promedio de cantidad entregada de los proveedores cuyo promedio de cantidad entregada es mayor al promedio de la cantidad entregada por el proveedor con el RFC 'VAGO780901'.