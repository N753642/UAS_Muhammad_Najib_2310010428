@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
        'class' => '
            bg-white
            text-gray-900
            border border-gray-300
            rounded-xl
            shadow-sm
            focus:border-indigo-500
            focus:ring-indigo-500
        '
    ]) }}
>
