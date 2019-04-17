# Laravel 5.8 and VueJS, Vuex base Admin template

## Backend Laravel 5.8
`cp .env.example .env` <br />
`sudo chmod -R 777 storage` <br />
`composer install` <br />
`php artisan key:generate` <br />
`php artisan migrate` <br />
`php artisan config:cache` <br />
`php artisan cache:clear` <br />


## Frontend VueJS

`yarn install` <br />
`yarn dev` for dev <br />
`yarn watch` for watch <br />
`yarn prod` for production <br />

## Structure Frontend

```$xslt
|-- admin -> Admin template module
    |-- components
       |-- b -> common components
       |-- core -> core components about layout (header, navbar, footer...)
    |-- img -> asset images
    |-- lang -> language, multi languages
    |-- plugins -> common plugins (eg: axios, theme, icons, alert ...)
    |-- router -> Vue Router
        |-- paths.js -> array routes paths
        |-- index.js -> configure router
    |-- store -> Vuex, managements by modules
    |-- styles -> scss, css, styles for app
    |-- views -> Components View for app (eg: Dashboard page, Users page, ....)
```

## Limitless theme static 
[Refer](https://github.com/binhnxit/limitless_theme_static)