@if(auth()->user()->estado == 'inactivo')
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-teal-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
</svg>
</div>
    <div>
      <p class="font-bold">Completa tu registro</p>
      <p class="text-sm">Termina tu registro para obtener acceso al sistema.</p>
      @if (auth()->user()->rol == 'coordinador')
      <a id="linkTwoActive" class="link nav-link-off-custom underline" href="{{ route('registroCoordinador') }}">Click para continuar</a>
      @else
      <a id="linkTwoActive" class="link nav-link-off-custom underline" href="{{ route('registroSemillerista') }}">Click para continuar</a>
      @endif
    </div>
  </div>
</div>
@else
<div class="bg-yellow-400 border-t-4 border-amber-500 rounded-b text-amber-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-5 text-amber-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
      </svg>
      </div>
    <div>
      <p class="font-bold">Proceso de registro en espera</p>
      <p class="text-sm">Espera a que el administrador acepte tu registro</p>
    </div>
  </div>
</div>
@endif