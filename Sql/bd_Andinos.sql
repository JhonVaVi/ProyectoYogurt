drop database if exists bd_Andinos;
create database bd_Andinos;
use bd_Andinos;
create Table Usuario(
  id_usuario int not null auto_increment,
  nombre_usuario varchar(150) not null,
  apellido_usuario varchar(150) not null,
  email_usuario varchar(150) not null,
  password_usuario varchar(150) not null,
  primary key(id_usuario)
);
create Table Cliente(

  id_cliente int not null auto_increment,
  id_usuario int not null,
  dni_cliente int not null,
  nombre_cliente varchar(150) not null,
  apellido_cliente varchar(150) not null,
  email_cliente varchar(150) not null,
  primary key(id_cliente),
  foreign key(id_usuario) references Usuario(id_usuario)
);
create Table Productos(
  id_producto int not null auto_increment,
  nombre_producto varchar(150) not null,
  precio_producto int not null,
  stock_producto int not null,
  primary key(id_producto)
);
create Table Pedidos(
  id_pedido int not null auto_increment,
  usuario int not null,
  cliente int not null,
  producto int not null,
  cantidad_pedido int not null,
  fecha_pedido varchar(150) not null,
  tipo_pedido varchar(150) not null,
  monto_pedido int not null,
  primary key(id_pedido),
  foreign key(usuario) references Usuario(id_usuario),
  foreign key(cliente) references Cliente(id_cliente),
  foreign key(producto) references Productos(id_producto)
);
create Table Detalle_Pedido(
  id_detalle_pedido int not null auto_increment,
  id_pedido int not null,
  id_producto int not null,
  cantidad int not null,
  primary key(id_detalle_pedido),
  foreign key(id_pedido) references Pedidos(id_pedido),
  foreign key(id_producto) references Productos(id_producto)
);

insert into Usuario values(null,'admin','admin','admin@admin','admin');