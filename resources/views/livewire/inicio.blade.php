<div class="w-screen min-h-screen bg-blue-100 flex items-center p-5 lg:p-20 overflow-hidden relative" x-data='concurso'>
    <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl px-4 p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left" x-data="{ modelOpen: @entangle('modelOpen').defer , ganador: @entangle('ganador')}">
        <div class="w-full">
            <div class="mb-10 lg:mb-20 ">
                <a href="{{route('cargar')}}">
                    <img src="{{ asset('img/logo.png') }}" class="w-44 h-20">
                </a>
            </div>
            <div class="mb-10 md:mb-20 text-gray-600 font-light">
                <h1 class="font-black uppercase text-3xl lg:text-5xl text-indigo-700 mb-10">Bienvenido al Concurso</h1>
                <p>Registre sus datos en nuestro sistemas para para participar en el concurso de un hermoso Automovil.
                </p>
            </div>
            <div class="mb-20 md:mb-0 flex">
                <button
                    class="text-lg font-light border-2 border-blue-500 p-2 rounded-xl transform transition-all hover:scale-110 text-blue-500 hover:text-white hover:bg-blue-500"
                    @click="add()">Registro</button>
                    @if(count($users) < 5)
                    <button
                    class="text-lg font-light border-2 border-gray-500 p-2 rounded-xl text-gray-500 hover:text-white hover:bg-gray-500 ml-6" disabled>Realizar Concurso ({{count($users)}})</button>
                    @else
                    <button
                    class="text-lg font-light border-2 border-green-500 p-2 rounded-xl transform transition-all hover:scale-110 text-green-500 hover:text-white hover:bg-green-500 ml-6"  @click="concurso">Realizar
                    Concurso ({{count($users)}})</button>
                    @endif
                <a href="/export"
                    class="text-lg font-light border-2 border-yellow-500 p-2 rounded-xl transform transition-all hover:scale-110 text-yellow-500 hover:text-white hover:bg-yellow-500 ml-6" >
                    Exportar Excel</a>
            </div>
        </div>
        <div class="w-full md:w-1/2 text-center">
            <x-car></x-car>
        </div>
        <div x-show="modelOpen"  class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>

                <div x-cloak x-show="modelOpen" 
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-gray-800 ">Registro</h1>

                        <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-500 ">
                       Ingresa Tus datos Personales
                    </p>

                    <form class="mt-5" @submit.prevent="enviar">
                        <div>
                            <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nombre</label>
                            <input required type="text" wire:model="nombre" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Apellidos</label>
                            <input required type="text" wire:model="apellidos" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Email:</label>
                            <input required type="email" wire:model="email" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Cedula:</label>
                            <input required type="number" wire:model="cedula" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Celular:</label>
                            <input required type="number" wire:model="celular" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Depratamento:</label>
                            <select wire:model.lazy="departamento_id"
                                class="text-md w-full mx-auto rounded-md focus:border-indigo-400 focus:border-2 border border-gray-200">
                                <option value="">Seleccionar un Departamento</option>
                                @foreach($departamentos as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Ciudad:</label>
                            <select wire:model.lazy="ciudad"
                                class="text-md w-full mx-auto rounded-md focus:border-indigo-400 focus:border-2 border border-gray-200">
                                <option value="">Seleccionar una Ciudad</option>
                                @foreach($ciudades as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <div class="mt-4 space-y-5">
                                <div class="flex items-center space-x-3 cursor-pointer" x-data="{ show: false }" @click="show =!show 
                                  @this.habeas = show">
                                    <div class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                                        :class="[show ? 'bg-indigo-500' : 'bg-gray-300']">
                                        <label for="show"
                                        @click="show =!show 
                                                @this.habeas = show"
                                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                        
                                            :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"></label>
                                        <input type="checkbox"  name="show" class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"/>
                                    </div>

                                    <p class="text-gray-500">Acepto los terminos y condiciones</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                               Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div
        class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform">
    </div>
    <div
        class="w-96 h-full bg-indigo-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform">
    </div>
    @push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('concurso', () => ({
                enviar() {
                    @this.add();
                },
                add() {
                    this.modelOpen = true;
                },
                concurso(){
                    let timerInterval
                    Swal.fire({
                    title: 'Buscando un Ganador!',
                    html: 'Estamos Calculado...',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        @this.realizarConcurso()
                        setTimeout( function(){
                         Swal.fire({
                        title:  'El Ganador' ,
                        html: @this.ganador,
                        width: 600,
                        padding: '3em',
                        color: '#716add',
                        background: '#fff ',
                        backdrop: `
                            rgba(0,0,123,0.4)
                           
                            left top
                            no-repeat
                        `
                        });
                        }, 1000);
                    }
                    }) 
                }
            }))
        })
    </script>
    @endpush
</div>
