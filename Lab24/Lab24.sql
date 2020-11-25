CREATE TABLE Clientes_Banca(
NoCuenta varchar(5) PRIMARY KEY,
Nombre varchar(30),
Saldo numeric(10,2)
)

CREATE TABLE Tipo_Movimiento(
ClaveM varchar(2) PRIMARY KEY,
Descripcion varchar(30)
)

CREATE TABLE Movimientos(
NoCuenta varchar(5),
ClaveM varchar(2),
Fecha datetime DEFAULT CURRENT_TIMESTAMP,
Monto numeric(10,2),

CONSTRAINT PK_Movimientos PRIMARY KEY (NoCuenta,ClaveM,Fecha),
FOREIGN KEY (NoCuenta) REFERENCES Clientes_Banca(NoCuenta),
FOREIGN KEY (ClaveM) REFERENCES Tipo_Movimiento(ClaveM)
)

BEGIN TRANSACTION PRUEBA1
INSERT INTO CLIENTES_BANCA VALUES('001', 'Manuel Rios Maldonado', 9000);
INSERT INTO CLIENTES_BANCA VALUES('002', 'Pablo Perez Ortiz', 5000);
INSERT INTO CLIENTES_BANCA VALUES('003', 'Luis Flores Alvarado', 8000);
COMMIT TRANSACTION PRUEBA1

SELECT * FROM Clientes_Banca

BEGIN TRANSACTION PRUEBA2
INSERT INTO CLIENTES_BANCA VALUES('004','Ricardo Rios Maldonado',19000);
INSERT INTO CLIENTES_BANCA VALUES('005','Pablo Ortiz Arana',15000);
INSERT INTO CLIENTES_BANCA VALUES('006','Luis Manuel Alvarado',18000);

SELECT * FROM CLIENTES_BANCA

ROLLBACK TRANSACTION PRUEBA2

SELECT * FROM CLIENTES_BANCA

BEGIN TRANSACTION PRUEBA3
INSERT INTO TIPO_MOVIMIENTO VALUES('A','Retiro Cajero Automatico');
INSERT INTO TIPO_MOVIMIENTO VALUES('B','Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3

BEGIN TRANSACTION PRUEBA4
INSERT INTO MOVIMIENTOS VALUES('001','A',GETDATE(),500);
UPDATE CLIENTES_BANCA SET SALDO = SALDO -500
WHERE NoCuenta='001'
COMMIT TRANSACTION PRUEBA4

select * from Movimientos

BEGIN TRANSACTION PRUEBA5
INSERT INTO CLIENTES_BANCA VALUES('005','Rosa Ruiz Maldonado',9000);
INSERT INTO CLIENTES_BANCA VALUES('006','Luis Camino Ortiz',5000);
INSERT INTO CLIENTES_BANCA VALUES('001','Oscar Perez Alvarado',8000);

IF @@ERROR = 0
COMMIT TRANSACTION PRUEBA5
ELSE
BEGIN
PRINT 'A transaction needs to be rolled back'
ROLLBACK TRANSACTION PRUEBA5
END

select * from Clientes_Banca

IF EXISTS (SELECT name FROM sysobjects
WHERE name = 'REGISTRAR_RETIRO_CAJERO' AND type = 'P')
DROP PROCEDURE REGISTRAR_RETIRO_CAJERO
GO

CREATE PROCEDURE REGISTRAR_RETIRO_CAJERO
@NoCuenta varchar(5),
@monto numeric(10,2)
AS
BEGIN TRANSACTION PRUEBA4
INSERT INTO MOVIMIENTOS VALUES(@NoCuenta,'A',GETDATE(),@monto);
UPDATE CLIENTES_BANCA SET SALDO = SALDO -@monto
WHERE NoCuenta=@NoCuenta
COMMIT TRANSACTION PRUEBA4
GO



EXECUTE REGISTRAR_RETIRO_CAJERO '001',500

SELECT * FROM Clientes_Banca