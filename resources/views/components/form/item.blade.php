{{-- Элемент формы с выводом ошибки под подставным компонентом --}}

@props([
    'label' => '',
    'name' => '',
])

<x-form.label-group :label="$label" :for="$name">
    {{-- Тело компонента, для input, select и любого другого элемента формы --}}
    {{ $slot }}

    {{-- Если есть ошибка с нужным ключём: выводится строка с сообщением ошибки --}}
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</x-form.label-group>
