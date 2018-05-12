## PASOS PARA EJECUTAR LA INSTALACIÓN DEL PROYECTO

- Descargar [Composer](https://getcomposer.org/download/)
- Clonar [sisVentas](https://github.com/jonathanaraul/proyecto-pad.git)
- Dirigirse al proyecto clonado
- Copiar el archivo .env.example a .env
- Modificar el archivo .env con los datos de la base de datos
- Desde la consola (Windows: Git Bash) ejecutar los comandos: 
	- composer install 			--> Instala las dependencias del proyecto
	- php artisan key:generate 	--> Genera una nueva clave de cifrado
	- php artisan config:clear 	--> Limpia la caché de configuraciones
	- php artisan route:list   	--> (Opcional) Muestra todas las rutas que han sido configuradas y a las cuales pueden ser accedidas 
- Instalar la base de datos sisventas
- Agregar los siguientes triggers a la base de datos:

DELIMITER //
CREATE TRIGGER tr_updStockIngreso AFTER INSERT ON detalle_ingreso
  FOR EACH ROW BEGIN
    UPDATE articulo SET stock = stock + NEW.cantidad
    WHERE articulo.idarticulo = NEW.idarticulo;
END
//
DELIMITER ;

DELIMITER
CREATE TRIGGER tr_updStockVenta AFTER INSERT ON detalle_venta
  FOR EACH ROW BEGIN
    UPDATE articulo SET stock = stock - NEW.cantidad
    WHERE articulo.idarticulo = NEW.idarticulo;
END
//
DELIMITER ;

- Ejecutar el proyecto