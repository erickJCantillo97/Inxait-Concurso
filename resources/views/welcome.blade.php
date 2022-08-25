<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Bienvenidos a la Rifa</title>
      @livewireStyles
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="w-screen min-h-screen bg-blue-100 flex items-center p-5 lg:p-20 overflow-hidden relative">
            <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left">
                <div class="w-full md:w-1/2">
                    <div class="mb-10 lg:mb-20">
                    <img src="{{asset('img/logo.png')}}" class="w-44 h-20">
                    </div>
                    <div class="mb-10 md:mb-20 text-gray-600 font-light">
                        <h1 class="font-black uppercase text-3xl lg:text-5xl text-indigo-700 mb-10">Bienvenido al Concurso</h1>
                        <p>Registre sus datos en nuestro sistemas para para participar en el concurso de un hermoso Automovil.</p>
                    </div>
                    <div class="mb-20 md:mb-0 flex">
                        <button class="text-lg font-light outline-none focus:outline-none transform transition-all hover:scale-110 text-blue-500 hover:text-blue-600">Registro</button>
                        <button class="text-lg font-light border-2 border-green-500 p-2 rounded-2xl transform transition-all hover:scale-110 text-green-500 hover:text-white hover:bg-green-500 ml-12">Realizar Concurso</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 text-center">
                <img src="https://flipstore.withun.link/images/404.png" class="w-64 h-64">
                
                </div>
            </div>
            <div class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform"></div>
            <div class="w-96 h-full bg-indigo-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform"></div>
        </div>
  
    </body>
    
        <script src="{{ asset('js/app.js') }}" defer></script>
</html>
