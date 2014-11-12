//tablas que se editaron 
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `apellido_casada` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nit` varchar(10) DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono_casa` varchar(45) DEFAULT NULL,
  `telefono_celular` varchar(45) DEFAULT NULL,
  `telefono_oficina` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `estado_civil` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `no_afiliacion_igss` varchar(45) DEFAULT NULL,
  `ruta_imagen` varchar(260) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_empleado_usuario1` (`id_usuario`),
  KEY `fk2_empleado_idx` (`municipio`),
  CONSTRAINT `fk2_empleado` FOREIGN KEY (`municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB ;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB ;

CREATE TABLE `tipo_documento` (
  `id_documento` int(11) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
   PRIMARY KEY (`id_documento`)
) ENGINE=InnoDB ;


CREATE TABLE `documentos_personales` (
  `id_documento` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `no_documento` varchar(45) DEFAULT NULL,
  `lugar_nacimiento` varchar(45) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `extendido_en` varchar(100) DEFAULT NULL,
  KEY `fk_documentos_personales_tipo_documento1` (`id_documento`),
  KEY `fk_documentos_personales_empleado1` (`id_empleado`),
  CONSTRAINT `fk_documentos_personales_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_personales_tipo_documento1` FOREIGN KEY (`id_documento`) REFERENCES `tipo_documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB ;

------------------------------------------------------
Datos de prueba

INSERT INTO `syskardb`.`usuario`(`id_usuario`,`username`,`contraseña`)
VALUES (1,"dpinto", sha1("Hola"));

INSERT INTO `syskardb`.`departamento`
(`id_departamento`,`nombre`)
VALUES(1,"Chiquimula");

INSERT INTO `syskardb`.`municipio`
(`id_municipio`, `nombre`,`id_departamento`)
VALUES (1,"Esquipulas",1);

INSERT INTO `syskardb`.`empleado`
(`id_empleado`,`nombres`,`apellidos`,
`apellido_casada`,`fecha_nacimiento`,
`nit`,`sexo`,`email`,`telefono_casa`,
`telefono_celular`,`telefono_oficina`,
`direccion`,`estado_civil`,`nacionalidad`,
`no_afiliacion_igss`,`ruta_imagen`,`estado`,`municipio`,`id_usuario`)
VALUES (1,"Darwin Randolfo","Pinto Felipe",
null,'1988/10/06',
"54654665-5","Masculino","dpinto7@hotmail.com","79430-564",
"4687-3442","79431-913",
"Esquipulas","Soltero","Guatemalteca",
"188282669","/img/fotos","Activo",1,1);

INSERT INTO `syskardb`.`tipo_documento`
(`id_documento`,`tipo_documento`)
VALUES (1, "DPI");

INSERT INTO `syskardb`.`documentos_personales`
(`id_documento`, `id_empleado`,`no_documento`,
  `lugar_nacimiento` ,  `fecha_vencimiento` ,
  `extendido_en`)VALUES (1,1,"1603-44077-2007","Esquipulas,Chiquimula,Guatemala","2020/11/07","Esquipulas,Chiquimula");

------------------------------------------------------
indeces 
ALTER TABLE empleado ADD FULLTEXT(nombres,apellidos);
------------------------------------------------------
delimiter //
create procedure insertar_tipo_puesto(in pid int, in pnombre varchar(150), pdescripcion varchar(200))
begin
insert into tipo_puesto(id_puesto,nombre_puesto,descripcion_cargo) values (pid,pnombre,pdescripcion);
end
//

delimiter //
create procedure datos_para_contrato (pnombre varchar(100))
begin
declare resultado varchar(40);

select apellido_casada into resultado from empleado where estado = 'Activo' and nombres like pnombre;

    if resultado is null then
        Select e.id_empleado, concat(e.nombres," ",e.apellidos) as Datos, year(curdate())-year(e.fecha_nacimiento) as Edad, e.estado_civil as estado, 
                e.nacionalidad as Nacionalidad,e.direccion as direccion,dp.no_documento as documento, dp.extendido_en as extendido
        from empleado as e, documentos_personales as dp,tipo_documento as tp
        where e.id_empleado = dp.id_empleado
        and tp.id_documento = dp.id_documento
        and tp.id_documento = 1
        and e.estado = 'Activo'
        and match(nombres,apellidos) against(pnombre);

    else 
        Select e.id_empleado,concat(nombres," ",apellidos," ", apellido_casada) as Datos, year(curdate())-year(e.fecha_nacimiento) as Edad, e.estado_civil as estado, 
                e.nacionalidad as Nacionalidad,e.direccion as direccion,dp.no_documento as documento, dp.extendido_en as extendido
        from empleado as e, documentos_personales as dp,tipo_documento as tp
        where e.id_empleado = dp.id_empleado
        and tp.id_documento = dp.id_documento
        and tp.id_documento = 1
        and e.estado = 'Activo'
        and match(nombres,apellidos) against(pnombre);
              
    end if;
    
end
//