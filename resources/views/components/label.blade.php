@props(['value'])

<label {{ $attributes->merge(['class' => 'block  text-sm text-black font-bold']) }}>
  {{ $value ?? $slot }}
</label>
