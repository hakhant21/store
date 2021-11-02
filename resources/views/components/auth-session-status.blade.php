@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 text-center tracking-widest']) }} id="charge-error">
        {{ $status }}
    </div>
@endif
