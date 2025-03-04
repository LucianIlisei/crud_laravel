README - Implementación de Funcionalidades en el Proyecto Laravel
Índice

    Implementación del Sistema de Autenticación (Login)
        1.1 Configuración Inicial del Proyecto
        1.2 Instalación de Laravel Breeze
        1.3 Migraciones y Modelos
        1.4 Rutas y Controladores
        1.5 Vistas
    Gestión de Alumnos
        2.1 Creación del Modelo y Migración
        2.2 Controlador de Alumnos
        2.3 Rutas
        2.4 Vistas
    Gestión de Proyectos
        3.1 Creación del Modelo y Migración
        3.2 Controlador de Proyectos
        3.3 Rutas
        3.4 Vistas
    Relación entre Alumnos y Proyectos
        4.1 Definición de la Relación en los Modelos
        4.2 Actualización de Migraciones
        4.3 Modificación de Controladores y Vistas

1.  Implementación del Sistema de Autenticación (Login)
    1.1 Configuración Inicial del Proyecto

        Archivos Involucrados: composer.json, .env
        Descripción: Se inicia creando un nuevo proyecto Laravel utilizando Composer.​
        kinsta.com
        Proceso:
            Ejecutar composer create-project laravel/laravel nombre_del_proyecto para crear el proyecto.​
            itsolutionstuff.com+1itsolutionstuff.com+1
            Configurar las variables de entorno en el archivo .env, como la conexión a la base de datos.​

1.2 Instalación de Laravel Breeze

    Archivos Involucrados: composer.json, package.json, routes/web.php, resources/views/auth/*, resources/views/layouts/*
    Descripción: Laravel Breeze proporciona una implementación sencilla y ligera de las funcionalidades de autenticación.​
    laravel.com+1medium.com+1
    Proceso:
        Instalar Laravel Breeze ejecutando composer require laravel/breeze --dev.​
        developer.auth0.com+4medium.com+4laravel.com+4
        Ejecutar php artisan breeze:install para instalar las vistas y rutas de autenticación.​
        Correr npm install y npm run dev para compilar los activos front-end.​

1.3 Migraciones y Modelos

    Archivos Involucrados: database/migrations/xxxx_xx_xx_xxxxxx_create_users_table.php, app/Models/User.php
    Descripción: Laravel Breeze crea automáticamente las migraciones necesarias para la tabla users y el modelo User.​
    Proceso:
        Revisar la migración en database/migrations/ que crea la tabla users.​
        umarfarooquekhan.medium.com+4magecomp.com+4itsolutionstuff.com+4
        Ejecutar php artisan migrate para aplicar las migraciones.​

1.4 Rutas y Controladores

    Archivos Involucrados: routes/web.php, app/Http/Controllers/Auth/*
    Descripción: Breeze configura las rutas necesarias para el registro, inicio de sesión y restablecimiento de contraseña.​
    medium.com
    Proceso:
        Revisar las rutas de autenticación en routes/web.php.​
        Los controladores correspondientes se encuentran en app/Http/Controllers/Auth/.​

1.5 Vistas

    Archivos Involucrados: resources/views/auth/login.blade.php, resources/views/auth/register.blade.php, resources/views/layouts/app.blade.php
    Descripción: Breeze proporciona vistas Blade para las páginas de autenticación.​
    Proceso:
        Personalizar las vistas en resources/views/auth/ según sea necesario.​
        Modificar el diseño principal en resources/views/layouts/app.blade.php.​

2.  Gestión de Alumnos
    2.1 Creación del Modelo y Migración

        Archivos Involucrados: app/Models/Alumno.php, database/migrations/xxxx_xx_xx_xxxxxx_create_alumnos_table.php
        Descripción: Se crea el modelo Alumno y su correspondiente migración para la tabla alumnos.​
        magecomp.com
        Proceso:
            Ejecutar php artisan make:model Alumno -m para generar el modelo y la migración.​
            magecomp.com
            Definir los campos necesarios en la migración, como nombre, email, edad.​
            Aplicar la migración con php artisan migrate.​

2.2 Controlador de Alumnos
Archivos Involucrados:

    app/Http/Controllers/AlumnoController.php
    app/Models/Alumno.php
    resources/views/alumnos/*
    routes/web.php

Descripción:

    Se encarga de manejar la lógica de negocio relacionada con los alumnos.
    Define los métodos CRUD: index(), create(), store(), edit(), update(), destroy().
    Se comunica con el modelo Alumno.php para obtener y manipular los datos.
    Pasa los datos a las vistas Blade (resources/views/alumnos/).

Proceso de Creación:

    Crear el controlador

        php artisan make:controller AlumnoController --resource

        Definir las rutas en routes/web.php para mapear las URL con los métodos del controlador.
        Modificar el controlador en AlumnoController.php agregando la lógica para manejar alumnos.
        Conectar el controlador con las vistas (index.blade.php, create.blade.php, etc.).

2.3 Rutas de Alumnos

    Archivo Involucrado: routes/web.php

    Descripción:

        Laravel utiliza este archivo para definir las URLs que se relacionan con el AlumnoController.

        Las rutas están estructuradas de la siguiente manera:
            /alumnos → Muestra todos los alumnos.
            /alumnos/create → Muestra el formulario para crear un nuevo alumno.
            /alumnos/{id}/edit → Permite editar la información de un alumno.
            /alumnos/{id} → Muestra los detalles de un alumno en específico.
            /alumnos/{id}/delete → Permite eliminar un alumno.

    Paso a Paso:
        Definir las rutas en routes/web.php con Route::resource('alumnos', AlumnoController::class);
        Laravel automáticamente mapea las rutas con los métodos del controlador.
        En cada vista (Blade) se usan las rutas con route('alumnos.index'), route('alumnos.create'), etc..

2.4 Vistas de Alumnos

    Archivos Involucrados:
        resources/views/alumnos/index.blade.php
        resources/views/alumnos/create.blade.php
        resources/views/alumnos/edit.blade.php
        resources/views/alumnos/show.blade.php

    Descripción:
        Laravel usa Blade como motor de plantillas para mostrar los datos de los alumnos.
        Se pasan los datos desde AlumnoController.php a las vistas mediante return view('alumnos.index', compact('alumnos'));
        En las vistas, se accede a los datos con {{ $alumno->nombre }}.

    Proceso:
        Crear la carpeta alumnos dentro de resources/views/.
        Dentro, crear los archivos Blade (index.blade.php, create.blade.php, etc.).
        Cada vista recibe los datos del controlador y los muestra en una tabla o formulario.
        En los formularios, los datos se envían con @csrf y @method('PUT') para actualizaciones.

3.  Gestión de Proyectos
    3.1 Creación del Modelo y Migración de Proyectos

        Archivos Involucrados:
            app/Models/Proyecto.php
            database/migrations/xxxx_xx_xx_create_proyectos_table.php

        Proceso:
            Generar el modelo y la migración:

            php artisan make:model Proyecto -m

            Definir los campos de la tabla en la migración (proyectos tendrá titulo, horas_previstas, fecha_comienzo).
            Ejecutar php artisan migrate para aplicar los cambios.

3.2 Controlador de Proyectos

    Archivos Involucrados:
        app/Http/Controllers/ProyectoController.php
        app/Models/Proyecto.php
        resources/views/proyectos/*
        routes/web.php

    Descripción:
        Gestiona las acciones CRUD para los proyectos.
        Se comunica con el modelo Proyecto.php para obtener y manipular la información.
        Envia los datos a las vistas en resources/views/proyectos/.

    Proceso de Creación:
        Crear el controlador:

        php artisan make:controller ProyectoController --resource

        Definir las rutas en routes/web.php con Route::resource('proyectos', ProyectoController::class);
        Modificar el controlador para agregar la lógica de los métodos CRUD.
        Crear las vistas en resources/views/proyectos/ y conectar con el controlador.

4.  Relación entre Alumnos y Proyectos
    4.1 Definición de la Relación en los Modelos

        Archivos Involucrados:
            app/Models/Alumno.php
            app/Models/Proyecto.php

        Proceso:
            En Alumno.php, agregar la relación con Proyecto:

public function proyecto() {
return $this->belongsTo(Proyecto::class, 'proyecto_id');
}

En Proyecto.php, agregar la relación con Alumnos:

        public function alumnos() {
            return $this->hasMany(Alumno::class, 'proyecto_id');
        }

4.2 Creación de la Clave Foránea en la Tabla alumnos

    Archivo Involucrado: database/migrations/xxxx_xx_xx_add_proyecto_id_to_alumnos_table.php
    Proceso:
        Crear la migración para agregar proyecto_id en alumnos:

        php artisan make:migration add_proyecto_id_to_alumnos_table --table=alumnos

        Modificar la migración para definir la clave foránea.
        Ejecutar php artisan migrate para aplicar los cambios.

4.3 Modificación de Controladores y Vistas

    Archivos Involucrados:
        app/Http/Controllers/AlumnoController.php
        resources/views/alumnos/create.blade.php
        resources/views/alumnos/edit.blade.php
        resources/views/alumnos/show.blade.php

    Proceso:
        En AlumnoController.php, modificar store() y update() para guardar el proyecto_id cuando se crea o edita un alumno.
        Modificar create.blade.php y edit.blade.php para incluir un <select> con los proyectos disponibles.
        En show.blade.php, mostrar el proyecto del alumno con {{ $alumno->proyecto->titulo ?? 'No asignado' }}.
