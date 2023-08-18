<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2 class="justify-self-end font-sans text-end font-extrabold text-2xl text-yellow-400 leading-tight">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>


</x-app-layout>
<script>
    const redireccion = localStorage.getItem('tipoCuenta');
    if (redireccion) {
        if (redireccion == "coordinador") {
            localStorage.removeItem('tipoCuenta');
            window.location.href = 'http://localhost:8000/registro/coordinador';
        }
        if (redireccion == "semillerista") {
            localStorage.removeItem('tipoCuenta');
            window.location.href = 'http://localhost:8000/registro/semillerista';
        }

    }
</script>


