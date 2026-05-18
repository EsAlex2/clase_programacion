CREATE DATABASE inventario;
USE inventario;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL
);

CREATE TABLE productos_vendidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad_vendida INT NOT NULL,
    fecha_venta DATE NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);