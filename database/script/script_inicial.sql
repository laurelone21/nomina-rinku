drop database if exists db_nomina_rinku;
create database db_nomina_rinku;
use db_nomina_rinku;

drop table if exists employees;

drop table if exists months;

drop table if exists paysheets;

drop table if exists roles;

drop table if exists salaries;

/*==============================================================*/
/* Table: employees                                             */
/*==============================================================*/
create table employees
(
   idEmployee           smallint not null auto_increment,
   idRoles              smallint,
   idSalary             smallint,
   firstName            varchar(60),
   lastName             varchar(60),
   lastNameMother       varchar(60),
   phone                varchar(10),
   email                varchar(100),
   primary key (idEmployee)
);

/*==============================================================*/
/* Table: months                                                */
/*==============================================================*/
create table months
(
   idMonth              smallint not null auto_increment,
   month                varchar(10),
   week                 smallint,
   primary key (idMonth)
);

/*==============================================================*/
/* Table: paysheets                                             */
/*==============================================================*/
create table paysheets
(
   idPaysheet           smallint not null auto_increment,
   idEmployee           smallint,
   idMonth              smallint,
   hoursWorked          smallint,
   numberDeliveries     smallint,
   salary               decimal(10,2),
   deliveries           decimal(10,2),
   bonus                decimal(10,2),
   vales                decimal(10,2),
   isr9                 decimal(10,2),
   isr3                 decimal(10,2),
   perceptions          decimal(10,2),
   deductions           decimal(10,2),
   total                decimal(10,2),
   primary key (idPaysheet)
);

/*==============================================================*/
/* Table: roles                                                 */
/*==============================================================*/
create table roles
(
   idRoles              smallint not null auto_increment,
   rol                  varchar(50),
   bonus                decimal(5,2),
   delivery             decimal(5,2),
   status               bit,
   primary key (idRoles)
);

/*==============================================================*/
/* Table: salaries                                              */
/*==============================================================*/
create table salaries
(
   idSalary             smallint not null auto_increment,
   salary               decimal(10,2),
   hour                 smallint,
   day                  smallint,
   week                 smallint,
   vale                 decimal(4,3),
   isr1                 decimal(4,3),
   isr2                 decimal(4,3),
   primary key (idSalary)
);

/*==============================================================*/
/* Table: tempPays                                              */
/*==============================================================*/
create table tempPays
(
   idTempPay            smallint not null auto_increment,
   idMonth              smallint,
   idEmployee           smallint,
   numberDeliveries     smallint,
   primary key (idTempPay)
);

alter table employees add constraint FK_REFERENCE_1 foreign key (idRoles)
      references roles (idRoles) on delete restrict on update restrict;

alter table employees add constraint FK_REFERENCE_2 foreign key (idSalary)
      references salaries (idSalary) on delete restrict on update restrict;

alter table paysheets add constraint FK_REFERENCE_3 foreign key (idEmployee)
      references employees (idEmployee) on delete restrict on update restrict;

alter table paysheets add constraint FK_REFERENCE_4 foreign key (idMonth)
      references months (idMonth) on delete restrict on update restrict;

alter table tempPays add constraint FK_REFERENCE_5 foreign key (idMonth)
      references months (idMonth) on delete restrict on update restrict;

alter table tempPays add constraint FK_REFERENCE_6 foreign key (idEmployee)
      references employees (idEmployee) on delete restrict on update restrict;