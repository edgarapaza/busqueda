select count(*) from escriotor1 where cod_inv  = 274341;
select count(*) from escrifavor1 where cod_inv  = 274341;

select cod_sct,cod_inv,cod_per,cod_inv_ju from escriotor1 where cod_inv  = 274341;
select cod_sct,cod_inv,cod_per,cod_inv_ju from escrifavor1 where cod_inv  = 274341;

select num_sct,fec_doc,nom_bie,can_fol,cod_pro,obs_sct,num_fol,hra_ing from escrituras1 where cod_sct = 320879;
select cod_not,cod_dst,cod_sub,cod_usu,proy_id from escrituras1 where cod_sct = 320879;


select num_protocolo from proyectos where proy_id = 168;
/*Hallar el nombre del notario*/
select concat(nom_not,' ',pat_not,' ',mat_not) as notario, provincia from notarios where cod_not = (select not_id from proyectos where proy_id = 168);
/*hallar el nombre del trabajador */
select concat(nom_usu,' ',pat_usu,' ',mat_usu) as trabajador from usuarios where cod_usu = (SELECT cod_usu from escrituras1 where cod_usu = 1127 limit 0,1);
/*HALLAR LA SUB SERIE DE LA ESCRITURA*/
select des_sub from subseries where cod_sub = (select cod_sub from escrituras where cod_sub = 46 limit 0,1);

SELECT cod_usu from escrituras1 where cod_usu = 1127 limit 0,1;
