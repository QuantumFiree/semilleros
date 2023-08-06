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
</style>
<form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST" action="{{route('perfilSemillerista')}}">
    @csrf
    <div class="three-columns-grid">
        <div class="column">
            <div style="display:none">
                <x-input id="cod_semillerista" type="text" name="cod_semillerista" :value="old('cod_semillerista')" value="{{$semillerista->cod_semillerista}}" />
            </div>
            <div style="display:none">
                <x-input type="text" name="url_reporte_actual" :value="old('cod_semillerista')" value="{{$semillerista->reporte_matricula}}" />
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
                <x-label for="direccion" value="{{ __('Dirección') }}" />
                <x-input id="direccion" class="block mt-1 w-full border-2 border-green-500" type="text" name="direccion" :value="old('direccion')" value="{{$semillerista->direccion}}" />
            </div>

            <div>
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input id="telefono" class="block mt-1 w-full border-2 border-green-500" type="text" name="telefono" :value="old('telefono')" value="{{$semillerista->telefono}}" />
            </div>

            <div style="display:none">
                <x-label for="genero" value="{{ __('Genero') }}" />
                <x-input id="genero" class="block mt-1 w-full border-2 border-green-500" type="text" name="genero" :value="old('genero')" value="{{$semillerista->genero}}" />
            </div>
            <div>
                <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                <x-input disabled id="fecha_nacimiento" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" value="{{$semillerista->fecha_nacimiento}}" />
            </div>


        </div>
        <div class="column">
            <div>
                <x-label for="cod_estudiantil" value="{{ __('Codigo estudiantil') }}" />
                <x-input disabled id="cod_estudiantil" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="cod_estudiantil" :value="old('cod_estudiantil')" value="{{$semillerista->cod_estudiantil}}" />
            </div>

            <div>
                <x-label for="semestre" value="{{ __('Semestre academico') }}" />
                <x-input disabled id="semestre" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="semestre" :value="old('semestre')" value="{{$semillerista->semestre}}" />
            </div>

            <div>
                <x-label for="cod_semillero" value="{{ __('Semillero') }}" />
                <x-input disabled id="cod_semillero" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="cod_semillero" :value="old('cod_semillero')" value="{{$semillerista->nombre}}" />
            </div>

            <div>
                <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                <x-input disabled id="fecha_vinculacion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" value="{{$semillerista->fecha_vinculacion}}" />
            </div>

            @if (auth()->user()->rol == 'semillerista')
            <div class="bg-gray-300 rounded mt-11 flex px-3 pt-2">
                <x-label class="my-1 font-medium" for="reporte_matricula" value="{{ __('Reporte de matricula') }}" />

                <x-button type="button" class="ml-4 mb-2 bg-green-500" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </x-button>
                <x-button type="button" class="ml-4 mb-2 bg-red-700" data-bs-toggle="modal" data-bs-target="#actualizarModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>

                </x-button>
            </div>

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
                                <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" placeholder="reporte_matricula" />
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
            @else
            <div>
                <x-label for="reporte_matricula" value="{{ __('Reporte de matricula (PDF)') }}" />
                <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" placeholder="reporte_matricula" />
            </div>
            @endif
            <div class="flex justify-end">
                <div class="flex items-center justify-end mt-4">
                    <x-button id="unlockButton" class="ml-4">
                        {{ __('Unlock') }}
                    </x-button>
                </div>
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
        const inputs = document.querySelectorAll('input');
        if (active) {
            inputs.forEach(input => {
                input.setAttribute('disabled', 'disabled');
            });
            active = false;
        } else {
            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });
            active = true;
        }
    });
</script>