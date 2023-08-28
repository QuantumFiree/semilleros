<style>
    .three-columns-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 50px;
        /* Espacio entre columnas */
    }

    .container-form {
        width: 600px;
        margin: auto;
    }

    .form-custom label {
        font-size: 15px;
        margin-bottom: 10px;
        margin-top: 20px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-white  text-left leading-tight">
                {{ __('Actualizar datos personales') }}
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="container-form">
            @component('components.form-editar-semillerista')
            @slot('semillerista', $semillerista)
            @slot('semilleros', $semilleros)
            @slot('programas', $programas)
            @endcomponent
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush
</x-app-layout>