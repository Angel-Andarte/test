## Requisitos

- PHP >= 8.0
- Composer
- Laravel 10
- Node.js y NPM
- Una base de datos (MySQL, PostgreSQL, etc.)
- Stripe API keys

## Instalación

1. **Clonar el Repositorio**

  https://github.com/Angel-Andarte/test.git
   
2. **Instalar Dependencias**

    composer install

    npm install && run dev

3. **Configurar Entorno**

    DB_CONNECTION=mysql

    DB_HOST=127.0.0.1

    DB_PORT=3306

    DB_DATABASE=test

    DB_USERNAME=usuario

    DB_PASSWORD=contraseña

    STRIPE_KEY=tu_clave_publica

    STRIPE_SECRET=tu_clave_secreta


## Para crear los usuarios utilizar la siguiente ruta

    /fetch-users

    Contraseña por defecto password123
