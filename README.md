#  **TP - Programación III**

Trabajo práctico de la materia **Programación III** — Desarrollo de una API en **PHP** utilizando **arquitectura hexagonal**.

---

## 🐳 Levantar contenedor Docker con PHP

1. 📂 Desde la raíz del proyecto, ejecutar en la terminal:

   ```bash
   docker compose up -d --build

2. Una vez creado el contenedor, ingresar a la consola Exec (click en el nombre del contenedor apache) y ejecutar los siguientes comandos para instalar Composer manualmente:
  ```bash
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
   
   php -r "if (hash_file('sha384', 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
   
   php composer-setup.php
   
   php -r "unlink('composer-setup.php');"
   
   php composer.phar install
```
3. Crear la base de datos tp-hexagonal e importar el archivo tp-hexagonal.sql que se encuentra en la raíz del proyecto
