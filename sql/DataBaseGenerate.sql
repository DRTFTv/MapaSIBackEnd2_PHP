-- Active: 1663964468965@@localhost@3306@mapasibackend2_bd
CREATE DATABASE IF NOT EXISTS mapasibackend2_bd;

CREATE TABLE protocolo_tb (
   protocolo_cd INT AUTO_INCREMENT NOt NULL,
   solicitante_nm VARCHAR(255),
   descricao_ds TEXT,
   email_ds VARCHAR(255),
   ano_dt YEAR(4),
   status_st TINYINT(4),
   dataCadastro_dt DATETIME,
   PRIMARY KEY (protocolo_cd)
);

SELECT * FROM protocolo_tb;