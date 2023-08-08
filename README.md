<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


# BACK livewire


## Instalar BackEnd

       composer create-project laravel/laravel example_liveware 8.6 --prefer-dist

## Configurar variables de entorno .env


## Modulos    
 - SLIDER
 - CARD
 - TEXIMG

## Diseño TABLAS

## SLIDER

    img	title	text	btn	btntext
    
## CARD

    img title  text  btn  btntext

## TEXTIMG

    img title  text

## Crear migrates

    php artisan make:migration create_slider_table

    php artisan make:migration create_card_table

    php artisan make:migration create_textimg_table
    

 ## add migration SLIDER

     <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    class CreateSliderTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('slider', function (Blueprint $table) {
                $table->id();
                $table->string('img');  // add
                $table->string('title');  // add
                $table->string('text');  // add
                $table->string('btn');  // add
                $table->string('btntext');  // add
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('slider');
        }
    }
## add migration CARD

        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        
        class CreateCardTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('card', function (Blueprint $table) {
                    $table->id();
                    $table->string('img');  // add
                    $table->string('title');  // add
                    $table->string('text');  // add
                    $table->string('btn');  // add
                    $table->string('btntext');  // add
                    $table->timestamps();
                });
            }
        
            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists('card');
            }
        }


## ADD migrate textimg
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        
        class CreateTextimgTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('textimg', function (Blueprint $table) {
                    $table->id();
                    $table->string('img');  // add
                    $table->string('title');  // add
                    $table->string('text');  // add
                    $table->timestamps();
                });
            }
        
            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists('textimg');
            }
        }

 ## invocar MIGRATE para actualizar datos
        php artisan migrate

## Instalar Livewire Crud Generator
        composer require flightsadmin/livewire-crud

## Instalar CRUD
        php artisan crud:install

## CREANDO CRUD CON TABLA SLIDER
        php artisan crud:generate slider

## NOTAS 
    -VERIFICAR EL NOMBRE DE LA TABLA CON CONTROLLER
    -ROUTE
    -MODEL
    
## INCORPORAR EL FRONT
Crear una view principal en la carpeta views, puedes guiarte con la vista default de home

## Administracion de secciones de las vistas
 -Directorios
 
 Resources>views>loyouts
  Archivo
  -app.blade.php

## Arquitectura HTML (index.blade.php)
      <HTML>
            <head>
        	<meta>
        	<link> 
        	<script>
        </head>
        <body>
        	<header>
        		<nav>
        		</hav>
        	</header>
        	<main>
        	    @yield('content') -> bloque de content
        	</main>    	
        </body>  
      </HTML>  
        
## Arquitectura  de content views>layouts>  (library.blade.php)
    @extends('layouts.app') -> llama al archivo app.blade.php
    @section('content') -> iniciacion del bloque content
    	-- add contenido html
    @endsection
Notas: Se puede agrear secciones como footer o alguna seccion

## CSS O STYLES
       Colocar estos estilos en
        
        public>css
## diferenciar el nav de laravel con el del FRONT

    En @extends('layouts.library') colocar los html del nav de menu del back
    
    En: Resources/views/auth ->login.blade.php , register.blade.php , verify.blade.php

    app.blade.php
    nav del front
## Recorrer dato slider

## Creacion de una ruta
    Route::get('/', [App\Http\livewire\Sliders::class, 'index'])->name('index');

    -index es la vista
    -index el metodo que se encuentra en Sliders

    En app/httpLivewire/

## En Slider agregar el metodo de index()

     public function index()
    {
        $sliders = Slider::all(); //select * from sliders
        return view('index', compact('sliders')); // manda en la variable sliders el rsultado de la consulta en la vista index


    }
## Recorrido en vista index
    @foreach($sliders as $slider)
        <div class="carousel-item active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" role="img" focusable="false">
            <rect width="100%" height="100%" fill="#777" /></svg>

          <div class="container">
            <div class="carousel-caption">
              <h1>{{ $slider->title }}</h1>
              <p>{{ $slider->text }}</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">{{ $slider->btntext }}</a></p>
            </div>
          </div>
        </div>
     @endforeach

    


        
