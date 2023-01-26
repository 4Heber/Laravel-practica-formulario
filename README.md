<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
  <h1 align="center">DWES - Desarrollo Web Entorno Servidor</h1>
  <h3 align="center">UD6 Formularios con Laravel</h3>
</p>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()

</div>

## 📑 About <a name = "about"></a>

### Formulario

- Crear una migración a partir de las indicaciones que se encuentran en el formulario base.
- Crear el formulario para introducir los datos del formulario, usando Html y Bootstrap. El campo acceso será de tipo select.
- Añadir a este formulario los 'old values'.
- Añadir soporte multilingüe para todos los labels del formulario. Utilizar las dos formas de traducción, alternativamente.
- De acuerdo con lo indicado en la migración, marcar como ‘required’ las entradas de formulario de los campos no nulos. Será la única validación realizada en el cliente.
- Modificar el formulario, usando Blade, para tratar los errores de validación que puedan producirse. Obligatoriamene se mostrarán al principio del formulario cuando falle la validación, Se valora también que se informe a pie de input.

### Controlador

- Crear un controlador de tipo resource para la implementación de un CRUD, ‘PostController’.
- Crear la validación del formulario en el controlador anterior, aplicada al método que inserta los datos en la tabla.
- Crear las rutas que manejen las operaciones del controlador anterior.
- Crear una ruta predeterminada que dirija las peticiones al punto de posts/create.

### Incersión

- Crear el modelo Post, añadiendo lo necesario para permitir una inserción usando Eloquent.
- Insertar al menos 2 post, manualmente o con otro método. Puedes usar sentencias raw (dependientes del SGBD) , QueryBuilder o Eloquent.
- Usar Gate para controlar que la actualización/eliminación solo pueda hacerla el autor del post.
- Subida a GitHub
- Despliegue en remoto

### Preview

#### Usuario no autenticado

<img src="https://user-images.githubusercontent.com/77643882/214837215-7ede9e8e-6d78-4a64-a360-8a9c947fb879.png" alt="Ejemplo-1" width="100%" />

#### Usuario autenticado

Login para test:
- Email: test_user@gmail.com
- Pass: admin1234

<img src="https://user-images.githubusercontent.com/77643882/214837506-253a7a87-fafa-4620-89aa-ba3e39da29a1.png" alt="Ejemplo-1" width="100%" />

#### Formulario creación nuevo post

<img src="https://user-images.githubusercontent.com/77643882/214838236-0a0d00ea-4abc-4ea4-ad0c-f6f4f6b6b3cf.png" alt="Ejemplo-1" width="100%" />

#### Vista post individual

<img src="https://user-images.githubusercontent.com/77643882/214838566-22ce6942-1bbd-4cee-9f80-aea432a21d12.png" alt="Ejemplo-1" width="100%" />

#### Vista error 403 no autorizado

<img src="https://user-images.githubusercontent.com/77643882/214839749-f666c056-5283-42bc-8a0a-707317cbcdb9.png" alt="Ejemplo-1" width="100%" />











