@if ($errors->any())
  <div {{ $attributes }}>
    <div class=" text-red-600 dark:text-red-400 font-bold">{{ __('¡Ups! Algo salió mal.') }}</div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400 font-bold">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
