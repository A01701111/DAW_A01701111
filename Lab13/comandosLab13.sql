INSERT INTO Materiales values(1000, 'xxx', 1000)
Delete from Materiales where Clave = 1000 and Costo = 1000
ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

sp_helpconstraint materiales


ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave, RFC, Numero, Fecha)

SELECT * from Materiales;
SELECT * from Proveedores;
SELECT * from Proyectos;
SELECT * from Entregan;

INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0);
SELECT * from Entregan;
Delete from Entregan where Clave = 0

ALTER TABLE entregan add constraint cfentreganclave foreign key (clave) references materiales(clave);
INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0);

ALTER TABLE entregan add constraint cfentreganrfc foreign key (RFC) references Proveedores(RFC);
ALTER TABLE entregan add constraint cfentregannumero foreign key (Numero) references Proyectos(Numero);

sp_helpconstraint Materiales
sp_helpconstraint Entregan
sp_helpconstraint Proveedores
sp_helpconstraint Proyectos

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);
SELECT * from Entregan;

Delete from Entregan where Cantidad = 0

ALTER TABLE entregan add constraint cantidad check (cantidad > 0);
INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);