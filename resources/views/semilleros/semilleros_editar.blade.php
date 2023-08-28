
<x-app-layout>
    <style>
        .form-input {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        .two-columns-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;

        }
        .container-auth {
            padding: 16px;
            border-radius: 8px;
            width: 550px;
            margin: auto;
            margin-top: 20px;
            background-color: rgb(31, 41, 55);
        }
        .nav-custom {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin: auto;
            margin-bottom: 20px;
            border: 1px solid rgb(31, 41, 55);
            border-radius: 5px;
            background-color: rgb(31, 41, 55);
        }
        .label-custom {
            color: white;
            margin-top: 8px;
        }
        .center-title {
            text-align: center;
            background-color: #1f2937;
            padding: 10px 0;
        }
        .title-border {
            border: 2px solid white;
            padding: 10px;
            border-radius: 8px;
            margin: 10px auto;
        }
        .nav-link-custom {
            background-color: rgb(34, 197, 94);
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }
        .nav-link-off-custom {
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }
        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .flex-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
    </style>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Editar información del Semillero') }}
            </h2>
        </div>
    </x-slot>

    <x-form_card>
        <x-slot name="logo">
        </x-slot>
        <form class="pb-5" method="POST" action="{{ route('actualizar_semillero', $semillero->cod_semillero) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="three-columns-grid columns-2">
                <div class="mr-10">
                    <div >
                        <x-label for="nombre" class="my-2" value="{{ __('Nombre del Semillero') }}" />
                        <x-input id="nombre" class="form-input" type="text" name="nombre" value="{{$semillero->nombre}}" required autofocus />
                        @error('nombre')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="correo" class="my-2" value="{{ __('Correo Electrónico') }}" />
                        <x-input id="correo" class="form-input" type="email" name="correo" value="{{$semillero->correo}}" required />
                        @error('correo')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <x-label for="descripcion" class="my-2" class="my-2" value="{{ __('Descripción') }}" />
                        <textarea id="descripcion" class="form-input h-32" type="text" name="descripcion" required><?php echo $semillero->descripcion; ?></textarea>
                        @error('descripcion')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="mision" class="my-2" value="{{ __('Misión') }}" />
                        <textarea id="mision" class="form-input  h-32" type="text" name="mision" required ><?php echo $semillero->mision; ?></textarea>
                        @error('mision')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="vision" class="my-2" value="{{ __('Visión') }}" />
                        <textarea id="vision" class="form-input  h-32" type="text" name="vision" required ><?php echo $semillero->vision; ?></textarea>
                        @error('vision')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="valores" class="my-2" value="{{ __('Valores') }}" />
                        <textarea id="valores" class="form-input  h-32" type="text" name="valores" required ><?php echo $semillero->valores; ?></textarea>
                        @error('valores')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                    <div class="h-12">
                        <h1>   </h1>
                    </div>
                    <div>
                        <x-label for="objetivo" class="my-2" value="{{ __('Objetivo') }}" />
                        <textarea id="objetivo" class="form-input  h-32" type="text" name="objetivo" required ><?php echo $semillero->objetivo; ?></textarea>
                        @error('objetivo')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="lineas_investigacion" class="my-2" value="{{ __('Líneas de Investigación') }}" />
                        <textarea id="lineas_investigacion" class="form-input  h-32" type="text" name="lineas_investigacion" required ><?php echo $semillero->lineas_investigacion; ?></textarea>
                        @error('lineas_investigacion')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                


                    <div>
                        <x-label for="presentacion" class="my-2" value="{{ __('Presentación') }}" />
                        <x-input id="presentacion" class="form-input" type="text" name="presentacion" value="{{$semillero->presentacion}}" required />
                        @error('presentacion')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="fecha_creacion" class="my-2" value="{{ __('Fecha de Creación') }}" />
                        <x-input id="fecha_creacion" class="form-input" type="date" name="fecha_creacion" value="{{$semillero->fecha_creacion}}"  required />
                        @error('fecha_creacion')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="numero_resolucion" class="my-2" value="{{ __('Número de Resolución') }}" />
                        <x-input id="numero_resolucion" class="form-input" type="number" name="numero_resolucion" value="{{$semillero->numero_resolucion}}" placeholder="#" required />
                        @error('numero_resolucion')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="logo" class="my-2" value="{{ __('Logo (Imagen)') }}" />
                        <x-input id="logo" class="form-input" type="file" name="logo" value="{{$semillero->logo}}" required accept="image/*" />
                        @error('logo')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="cod_coordinador" class="my-2" value="{{ __('Código de Coordinador Encargado') }}" />
                        <x-input id="cod_coordinador" class="form-input" type="number" name="cod_coordinador" value="{{$semillero->cod_coordinador}}" placeholder="#" required />
                        @error('cod_coordinador')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label for="archivo" class="my-2" value="{{ __('Archivo Presentación:') }}" />
                        <x-input id="archivo" class="form-input" type="file" name="archivo" value="{{$semillero->archivo}}"  required accept="file/*" />
                    </div>

                    <div>
                        <x-label for="archivo_resolucion" class="my-2" value="{{ __('Archivo Resolución:') }}" />
                        <x-input id="archivo_resolucion" class="form-input" type="file" name="archivo_resolucion" value="{{$semillero->archivo_resolucion}}" required accept="file/*" />
                    </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button type="submit" >
                    {{ isset($semillero) ? __('Actualizar') : __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-form_card>
</x-app-layout>

