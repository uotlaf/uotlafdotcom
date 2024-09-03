<div class="flex border-2 border-blue-400 rounded-xl py-2 px-2 items-center">
    @if (!isset($position) || $position != "right")
        <img class="rounded-full h-16" src="{{ $icon }}" alt="{{$name}}">
        <div class="flex flex-col mx-3">
            <span class="font-bold text-xl">{{ $name }}</span>
            <span>{{ $phrase }}</span>
        </div>
    @else
        <div class="ml-auto flex flex-col mx-3">
            <span class=" ml-auto font-bold text-xl">{{ $name }} </span>
            <span>{{ $phrase }}</span>
        </div>
        <img class="rounded-full h-16" src="{{ $icon }}" alt="{{$name}}">
    @endif
</div>
