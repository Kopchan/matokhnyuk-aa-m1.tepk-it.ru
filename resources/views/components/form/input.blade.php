{{-- Поле ввода для формы с заголовком-меткой и выводом ошибок --}}

@props([
    'label' => '',
    'name' => '',
    'object' => null,
    'default' => '',
])

<x-form.item :label="$label" :name="$name">
    <input
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $object ? $object->{$name} : $default) }}"
        placeholder="Введите {{ mb_lcfirst($label) }}"
        {{ $attributes }} {{-- Остальные явно не определённые (в @props) параметры компонента. Например step, min, max --}}
    />
</x-form.item>
