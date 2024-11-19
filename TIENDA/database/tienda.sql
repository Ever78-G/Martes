create database if NOT EXISTS veterinaria; 

use veterinaria; 
create table if not exists usuario(
    id_usuario int(11) auto_increment not null,
    nombre varchar(100) not null,
    apellidos varchar(100) not null,
    email varchar(200) not null,
    contraseñas varchar(255) not null, 
    constraint pk_usuario primary key(id_usuario),
    constraint uq_email unique (email)
)engine=InnoDB; 

insert into usuario (id_usuario, nombre, apellidos, email, contraseñas) values
(null, 'samuel alexis', 'rodriguez montaño', 'samuelsarm2314@gmail.com', 'samuu09');


create table if not exists categoria(
    id_categoria int(11) auto_increment not null,
    nombre_categoria varchar(100) not null,
    constraint pk_categoria primary key(id_categoria)
)engine=InnoDB;
insert into categoria values(null,"domesticos");

create table if not exists producto(
    id_producto int(11) auto_increment not null,
    nombre_producto varchar(100) not null,
    descripcoon varchar(250),
    precio double(10,2) not null,
    stock int(11),
    oferta varchar(100),
    fecha date,
    imagen varchar(250),
    id_categoria int(11),
    constraint pk_producto primary key(id_producto),
    constraint fk_categoria foreign key(id_categoria) references categoria(id_categoria)
)engine=InnoDB;

insert into producto values(null,"collares","collares en lana",100,10,'',curdate(),null,1);

create table if NOT exists pedidos(
    id_pedido int(11) auto_increment not null,
    id_usuario int(11) NOT null,
    cuidad varchar(100) NOT NULL,
    direccion varchar(100) NOT NULL,
    costo float(100,2) NOT NULL,
    estado varchar(20) not null,
    fecha date,
    hora time,
    constraint pk_pedido primary key(id_pedido),
    constraint fk_usuario foreign key(id_usuario) references usuario(id_usuario)

)engine=InnoDB;

create table if not exists lineas_pedido(
    id_linea_pedido int(11) auto_increment not null,
    id_pedido int(11) not null,
    id_producto int(11) not null,
    unidades int(100) not null,
    constraint pk_linea_pedido primary key(id_linea_pedido),
    constraint fk_pedido foreign key(id_pedido) references pedidos(id_pedido),
    constraint fk_producto foreign key(id_producto) references producto(id_producto)
)engine=InnoDB;
