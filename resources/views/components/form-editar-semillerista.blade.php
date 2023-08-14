<style>
    .three-columns-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 50px;
        /* Espacio entre columnas */
    }

    .container-form {
        width: 800px;
        margin: auto;
    }

    .form-custom label {
        font-size: 15px;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST" action="{{route('perfilSemillerista')}}">
    @csrf
    <div class="three-columns-grid">
        <div class="column">
            <div style="display:none">
                <x-input id="cod_user" type="text" name="cod_user" :value="old('cod_user')" value="{{$semillerista->cod_user}}" />
            </div>
            <div style="display:none">
                <x-input id="cod_semillerista" type="text" name="cod_semillerista" :value="old('cod_semillerista')" value="{{$semillerista->cod_semillerista}}" />
            </div>
            <div style="display:none">
                <x-input type="text" name="url_reporte_actual" :value="old('cod_semillerista')" value="{{$semillerista->reporte_matricula}}" />
            </div>

            <div>
                <x-label for="cod_semillerista" value="{{ __('Codigo semillerista') }}" />
                <x-input disabled id="cod_semillerista" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="cod_semillerista" :value="old('cod_semillerista')" value="{{$semillerista->cod_semillerista}}" />
            </div>
            <div>
                <x-label for="nombres" value="{{ __('Nombres') }}" />
                <x-input disabled id="nombres" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="nombres" :value="old('nombres')" autofocus autocomplete="nombres" value="{{$semillerista->nombres}}" />
            </div>

            <div>
                <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                <x-input disabled id="apellidos" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="apellidos" :value="old('apellidos')" autofocus autocomplete="apellidos" value="{{$semillerista->apellidos}}" />
            </div>

            <div>
                <x-label for="identificacion" value="{{ __('Identificacion') }}" />
                <x-input disabled id="identificacion" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="identificacion" :value="old('identificacion')" value="{{$semillerista->identificacion}}" />
            </div>

            <div>
                <x-label for="genero" value="{{ __('Genero') }}" />
                <select disabled id="genero" name="genero" autocomplete="genero" class="block border-1 border-green-500 w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option select class="hidden" value="{{$semillerista->genero}}">{{$semillerista->genero}}</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>

                </select>
            </div>

            <div>
                <x-label for="direccion" value="{{ __('Dirección') }}" />
                @if(auth()->user()->rol == 'admin')
                <x-input disabled id="direccion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="direccion" :value="old('direccion')" value="{{$semillerista->direccion}}" />
                @else
                <x-input id="direccion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="direccion" :value="old('direccion')" value="{{$semillerista->direccion}}" />
                @endif
            </div>

            <div>
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                @if(auth()->user()->rol == 'admin')
                <x-input disabled id="telefono" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="telefono" :value="old('telefono')" value="{{$semillerista->telefono}}" />
                @else
                <x-input id="telefono" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="telefono" :value="old('telefono')" value="{{$semillerista->telefono}}" />
                @endif
            </div>





        </div>
        <div class="column">
            <div>
                <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                <x-input disabled id="fecha_nacimiento" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" value="{{$semillerista->fecha_nacimiento}}" />
            </div>
            <div>
                <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                <x-input disabled id="fecha_vinculacion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" value="{{$semillerista->fecha_vinculacion}}" />
            </div>
            <div>
                <x-label for="cod_estudiantil" value="{{ __('Codigo estudiantil') }}" />
                <x-input disabled id="cod_estudiantil" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="cod_estudiantil" :value="old('cod_estudiantil')" value="{{$semillerista->cod_estudiantil}}" />
            </div>

            <div>
                <x-label for="semestre" value="{{ __('Semestre academico') }}" />
                <x-input disabled id="semestre" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="number" name="semestre" :value="old('semestre')" value="{{$semillerista->semestre}}" />
            </div>

            <div>
                <x-label for="cod_semillero" value="{{ __('Semillero') }}" />
                <select disabled id="cod_semillero" name="cod_semillero" autocomplete="cod_semillero" class="block border-1 border-green-500 w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option select class="hidden" value="{{$semillerista->cod_semillero}}">{{$semillerista->nombre}}</option>
                    @foreach($semilleros as $s)
                    <option value="{{$s->cod_semillero}}">{{$s->nombre}}</option>
                    </option>
                    @endforeach

                </select>
            </div>
            <div>
                <x-label for="cod_programa_academico" value="{{ __('Programa academico') }}" />
                <select disabled id="cod_programa_academico" name="cod_programa_academico" value="hola" autocomplete="cod_programa_academico" class="block border-1 border-green-500 w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option select class="hidden" value="{{$semillerista->cod_programa_academico}}">{{$semillerista->nombre_programa}}</option>
                    </option>
                    @foreach($programas as $p)
                    <option value="{{$p->cod_programa_academico}}">{{$p->nombre_programa}}</option>
                    </option>
                    @endforeach

                </select>
            </div>




            <div class="bg-gray-300 rounded mt-11 flex px-3 pt-2">
                <x-label class="my-1 font-medium" for="reporte_matricula" value="{{ __('Reporte de matricula') }}" />

                <x-button type="button" class="ml-4 mb-2 bg-green-500" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </x-button>
                <x-button disabled type="button" id="reporteMatriculaAct" class="ml-4 mb-2 bg-red-700" data-bs-toggle="modal" data-bs-target="#actualizarModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                </x-button>
            </div>

            @if(auth()->user()->rol == 'admin')
            <div>
                <label class="relative inline-flex items-center mr-5 cursor-pointer">
                    @if($semillerista->estado == 'activo')
                    <input disabled name='estado' type="checkbox" value="activo" class="sr-only peer" checked>
                    @else
                    <input disabled name='estado' type="checkbox" value="activo" class="sr-only peer">
                    @endif
                    <div class="w-11 h-6 bg-red-200 rounded-full peer dark:bg-red-700 peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-gray-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-red-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-400 peer-checked:bg-green-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-700">Estado de cuenta (Inactivo/Activo)</span>
                </label>
            </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reporte de matricula</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <embed src="{{ asset('storage/' . $semillerista->reporte_matricula) }}" type="application/pdf" width="100%" height="400px">
                        </div>
                        <div class="modal-footer">
                            <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                {{ __('Cerrar') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar reporte de matricula</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <x-label for="reporte_matricula" value="{{ __('Reporte de matricula (PDF)') }}" />
                                @if(auth()->user()->rol == 'admin')
                                <x-input disabled id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" placeholder="reporte_matricula" />
                                @else
                                <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" placeholder="reporte_matricula" />
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                {{ __('Confirmar') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                @if(auth()->user()->rol == 'admin')
                <div class="flex items-center justify-end mt-4">
                    <x-button id="unlockButton" class="ml-4">
                        {{ __('Unlock') }}
                    </x-button>
                </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                    <x-button id="buttonRegistro" class="ml-4">
                        {{ __('Actualizar') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const unlock = document.getElementById('unlockButton');
    let active = false;
    unlock.addEventListener('click', (event) => {
        event.preventDefault();
        const reporteAct = document.getElementById('reporteMatriculaAct');
        const selectGenero = document.getElementById('genero');
        const selectSemilleros = document.getElementById('cod_semillero');
        const selectProgramas = document.getElementById('cod_programa_academico');
        const inputs = document.querySelectorAll('input');
        if (active) {
            selectSemilleros.setAttribute('disabled', 'disabled');
                selectProgramas.setAttribute('disabled', 'disabled');
                selectGenero.setAttribute('disabled', 'disabled');
                reporteAct.setAttribute('disabled', 'disabled');
                unlock.innerHTML = 'unlock';
            inputs.forEach(input => {
                input.setAttribute('disabled', 'disabled');
            });
            active = false;
        } else {
            selectSemilleros.removeAttribute('disabled');
                selectProgramas.removeAttribute('disabled');
                selectGenero.removeAttribute('disabled');
                reporteAct.removeAttribute('disabled');
                unlock.innerHTML = 'lock';
            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });
            active = true;
        }
    });
</script>