# Instalación
1. Descargar el proyecto y acceder a la carpeta.
2. Crear el fichero .env copiando el .env.example
`cp .env.example .env`
3. Ejecutar composer para instalar las dependencias
`docker run --rm -v "$(pwd)":/opt -w /opt laravelsail/php81-composer:latest bash -c "composer install"`
4. Iniciar los contenedores
`./vendor/bin/sail up -d`
## Base de datos
Crear la base de datos ejecutando:
`./vendor/bin/sail artisan migrate --path=database/migrations/trevenque`
### Seeders
Los seeders se encargan de crear data de prueba para el proyecto. Se ejecutan a través del siguiente comando:
`./vendor/bin/sail artisan db:seed --class=<Seeder a ejecutar>`
Siendo **Seeder a ejecutar** alguno de los siguientes:
**TitulacionSeeder**: crea 5 titulaciones.
**AsignaturaSeeder**: crea 5 asignaturas intentando asignarla a una titulacion existente o creando una nueva en caso de que sea necesario (no valida la combinación titulacion asignatura).
**AlumnoSeeder**: crea 5 alumnos.
**CursoSeeder**: crea 5 inscripciones aleatorias entre los alumnos y asignaturas existentes creando nuevos en caso de que sea necesario (no inscribe repetido pero no respeta la capacidad de la asignatura).
**ExamenSeeder**: crea 5 examenes aleatorios entre los cursos existentes o crea nuevos de ser necesario (no valida que sean solo 2 convocatorias)
los seeder no tienen en cuenta las validaciones por lo que podrían romper algunas reglas, sin embargo a través del sistema si se aplican todas estas validaciones.

# Uso
## Titulaciones
Consiste en un CRUD que en el index muestra la cantidad de asignaturas asociadas y en el detalle muestra la lista.
## Asignaturas
Consiste en un CRUD que a través del detalle de la asignatura muestra los alumnos inscritos y las calificaciones, también permite realizar las siguientes acciones:
- Inscribir y de dar de baja alumnos en la asignatura
- Calificar alumnos en la asignatura
- Borrar calificaciones
## Alumnos
Consiste en un CRUD que a través del detalle del alumno muestra las asignaturas en las que está inscrito y sus calificaciones, también permite realizar las siguientes acciones:
- Inscribir y dar de baja al alumno en varias asignaturas
- Calificar al alumno en las asignaturas que cursa
- Borrar calificaciones