# CRUD de Usuarios con PHP y MySQL

Aplicación web CRUD (Create, Read, Update, Delete) desarrollada con **PHP**, **MySQL**, **Bootstrap** y arquitectura básica inspirada en el patrón **MVC**.
Este proyecto permite registrar, visualizar, editar y eliminar usuarios desde una interfaz sencilla y responsive.

## 🚀 Demo en línea

Puedes probar el proyecto aquí:

[Demo CRUD Usuarios - JMARTECH](https://jmartech.com/crud-usuarios)

---

## Funcionalidades

* ✅ Registrar usuarios
* ✅ Listar usuarios desde MySQL
* ✅ Editar registros
* ✅ Eliminar usuarios
* ✅ Validación básica de datos
* ✅ Prevención de registros duplicados
* ✅ Uso de consultas preparadas (`prepare` y `bind_param`)
* ✅ Interfaz responsive con Bootstrap
* ✅ Iconos con Font Awesome

---

## Tecnologías utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* Font Awesome
* XAMPP (entorno local)

---

## 📂 Estructura del proyecto

```bash
crud-usuarios/
│
├── controller/
│   ├── editar.php
│   ├── eliminar.php
│   └── registro.php
│
├── model/
│   ├── conexion.php
│   └── obtenerDatos.php
│
├── editarUsuario-view.php
├── index.php
└── README.md
```

---

## Instalación local

1. Clona el repositorio:

```bash
git clone https://github.com/TU-USUARIO/crud-usuarios.git
```

2. Mueve el proyecto a la carpeta `htdocs` de XAMPP.

3. Inicia:

* Apache
* MySQL

4. Crea una base de datos llamada:

```sql
crud-usuarios
```

5. Importa la tabla correspondiente o crea una similar:

```sql
CREATE TABLE persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    cc INT,
    fecha_nac DATE,
    email VARCHAR(150)
);
```

6. Configura la conexión en:

```bash
model/conexion.php
```

---

## Objetivo del proyecto

Este proyecto fue desarrollado como práctica para fortalecer conocimientos en:

* PHP procedural y POO básica
* CRUDs reales
* Manejo de formularios
* Arquitectura MVC básica
* Consultas preparadas
* Seguridad básica en formularios
* Integración frontend/backend

---

## 👨‍💻 Autor

Desarrollado por Jmartech- John Jáner

🌐 Portafolio:
[JMARTECH](https://jmartech.com)

---

## 📄 Licencia

Proyecto de práctica y aprendizaje. Uso libre para fines educativos.
