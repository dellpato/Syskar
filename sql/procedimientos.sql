delimiter //
create procedure insertar_tipo_puesto(in pid int, in pnombre varchar(150), pdescripcion varchar(200))
begin
insert into tipo_puesto(id_puesto,nombre_puesto,descripcion_cargo) values (pid,pnombre,pdescripcion);
end
//

delimiter //
create procedure mostrar_tipo_puesto(in pid)
begin
Select nombre_puesto
from tipo_puesto
where id_puesto = pid;
end
//
