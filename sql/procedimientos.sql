delimiter //
create procedure insertar_tipo_puesto(in pid int, in pnombre varchar(150), pdescripcion varchar(200))
begin
insert into tipo_puesto(id_puesto,nombre_puesto,descripcion_cargo) values (pid,pnombre,pdescripcion);
end
//
