INSERT INTO `bizani_platform`.`tipo_publicacion_inmueble` (`tipu_id`, `tiin_id`) VALUES 
('4', '1'),('4', '2'),('4', '17'),('4', '3'),('4', '4'),('4', '15'),('4', '5'),('4', '18'),('4', '19'),('4', '6'),('4', '7'),('4', '9'),('4', '8'),('4', '14'),('4', '16'),('4', '10'),('4', '11');

SELECT 
* 
FROM 
tipo_publicacion tp,
tipo_inmueble ti,
tipo_publicacion_inmueble tpi
WHERE tpi.tipu_id=tp.tipu_id
AND tpi.tiin_id=ti.tiin_id

SELECT 
* 
FROM 
tipo_publicacion tp,
tipo_inmueble ti,
tipo_publicacion_inmueble tpi
WHERE tpi.tipu_id=tp.tipu_id
AND tpi.tiin_id=ti.tiin_id
AND tp.tipu_valor='arriendo_habitacion'