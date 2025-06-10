{{-- Выпадающий список для формы с заголовком-меткой и выводом ошибок --}}

@props([
    'label' => '',
    'name' => '',
    'object' => null,
    'options' => [],
])

<x-form.item :label="$label" :name="$name">
    <select name="{{ $name }}" id="{{ $name }}">
        @foreach ($options as $option)
            {{-- Перечисление возможных опций --}}
            <option
                value="{{ $option->id }}"
                @if ($option->id === ($object ? $object->{$name} : ''))
                    {{-- Если был задан объект привязки (object) и заданное поле (name) имеет такое же значение (id),
                         что и у перечисленной опции (option) - устанавливается как по умолчанию --}}
                    selected
                @endif
            >
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</x-form.item>
