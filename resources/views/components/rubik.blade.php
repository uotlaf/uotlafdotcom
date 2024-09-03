<div id="cube"
     class="
        aspect-square
        animate-[rubik-spin3d_10s_infinite_linear]
        transform-preserve-3d
        [--cube-size:60vw]
        lg:[--cube-size:8vw]
        [--border-radius-high:30vw]
        [--border-radius-low:10vw]
        w-[var(--cube-size)]"
     style="
        --rotate3d-init: 0.4, 1, 0, 0deg;
        --rotate3d-end: 0.4, 1, 0, 360deg;
        --grid-gap: 0.2vw;">
    {{--    Front    --}}
    <div
        class="
            aspect-square rounded-s
            absolute grid grid-cols-3
            bg-black transform-preserve-3d w-[var(--cube-size)] gap-[var(--grid-gap)]
            "
        style="transform: translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div
            class="aspect-square rounded-s bg-orange-400"
            style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-orange-400
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-green-500"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-sky-500
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-sky-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-slate-100
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
             aspect-square bg-green-500
             rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
    </div>
    {{--    Top      --}}
    <div
        class="aspect-square rounded-s
        absolute grid grid-cols-3
        bg-black transform-preserve-3d w-[var(--cube-size)]  gap-[var(--grid-gap)]"
        style="transform: rotate3d(1, 0, 0, 90deg) translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div class="aspect-square rounded-s bg-sky-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-green-500
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-green-500"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-yellow-400
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-yellow-400
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-green-500
            rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
    </div>
    {{--    Bottom   --}}
    <div
        class="
            aspect-square rounded-s
            absolute grid grid-cols-3
            bg-black transform-preserve-3d w-[var(--cube-size)]  gap-[var(--grid-gap)]"
        style="transform: rotate3d(1, 0, 0, -90deg) translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div class="aspect-square rounded-s bg-sky-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-red-500
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-sky-500"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-slate-100
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-orange-400
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-green-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-sky-500
            rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-orange-400"
             style="transform: translateZ(0.5vh)"></div>
    </div>
    {{--    Left     --}}
    <div
        class="
            aspect-square rounded-s
            absolute grid grid-cols-3
            bg-black cube_face_left transform-preserve-3d w-[var(--cube-size)]  gap-[var(--grid-gap)]"
        style="transform: rotate3d(0, 1, 0, -90deg) translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div class="aspect-square rounded-s bg-green-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-yellow-400
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-red-500"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-green-500
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-orange-400"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-sky-500
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-red-500
            rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
    </div>
    {{--    Right    --}}
    <div
        class="
            aspect-square rounded-s
            absolute grid grid-cols-3
            bg-black transform-preserve-3d w-[var(--cube-size)]  gap-[var(--grid-gap)]"
        style="transform: rotate3d(0, 1, 0, 90deg) translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div class="aspect-square rounded-s bg-red-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-orange-400
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-red-500"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-sky-500
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-red-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-red-500
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-orange-400
            rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
    </div>
    {{--    Back     --}}
    <div
        class="
            aspect-square rounded-s
            absolute grid grid-cols-3
            bg-black transform-preserve-3d w-[var(--cube-size)]  gap-[var(--grid-gap)]"
        style="transform: rotate3d(0, 1, 0, 180deg) translate3d(0, 0, calc(var(--cube-size) / 2 - 0.5vh))">
        <div class="aspect-square rounded-s bg-slate-100"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-green-500
            rounded-t-[var(--border-radius-low)] rounded-b-[var(--border-radius-high)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>

        <div class="
            aspect-square bg-yellow-400
            rounded-l-[var(--border-radius-low)] rounded-r-[var(--border-radius-high)]
            "
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-yellow-400"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-yellow-400
            rounded-l-[var(--border-radius-high)] rounded-r-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>

        <div class="aspect-square rounded-s bg-green-500"
             style="transform: translateZ(0.5vh)"></div>
        <div class="
            aspect-square bg-green-500
            rounded-t-[var(--border-radius-high)] rounded-b-[var(--border-radius-low)]"
             style="transform: translateZ(0.5vh)"></div>
        <div class="aspect-square rounded-s bg-sky-500"
             style="transform: translateZ(0.5vh)"></div>
    </div>
</div>
<a
    id="reset_cube"
    class="
        absolute bottom-0 left-0
        flex h-10 group-hover:h-20 flex-col drop-shadow-2xl
        bg-zinc-900/70 backdrop-blur-sm px-2 py-2 transition-all rounded-tr-xl opacity-0"
    onclick="enable_cube_rotation()">
    ⟳ {{ __("default.reset_position") }}
</a>

<script>
    let cube = document.getElementById("cube");
    let div = document.getElementById("3d_object");
    let reset_button = document.getElementById("reset_cube")
    let current_rotation_matrix = {'x': 0, 'y': 0};
    let current_mouse_pos = null;
    let original_animation = cube.style.getPropertyValue("animation");

    function reset_mouse_position() {
        // Mouse is out of div. Reset current pos and disable movement follow
        disable_rotation();
        current_mouse_pos = null;
    }

    function rotateCube(event) {
        console.log(event)
        if (current_mouse_pos == null) {
            return current_mouse_pos = {'x': event.clientX, 'y': event.clientY};
        }

        current_rotation_matrix['y'] += (event.clientX - current_mouse_pos['x']);
        current_rotation_matrix['x'] += (current_mouse_pos['y'] - event.clientY);
        current_mouse_pos['x'] = event.clientX;
        current_mouse_pos['y'] = event.clientY;


        let rotate = "rotateX(" + current_rotation_matrix['x'] + 'deg) '
            + "rotateY(" + current_rotation_matrix['y'] + 'deg)'

        cube.style.setProperty("transform", rotate)
    }

    function disable_cube_animation() {
        cube.style.setProperty("animation", "none");

        // Add eventListeners
        div.addEventListener('mouseleave', reset_mouse_position);
        div.addEventListener('touchend', reset_mouse_position);
        div.addEventListener('mousemove', rotateCube);
        div.addEventListener('touchmove', rotateCube);
        reset_button.style.setProperty("opacity", 1);
    }

    function disable_rotation() {
        div.removeEventListener('mousemove', rotateCube);
        div.removeEventListener('touchmove', rotateCube);
        div.removeEventListener('mouseleave', reset_mouse_position);
        div.removeEventListener('touchend', reset_mouse_position);
    }

    function enable_cube_rotation() {
        cube.style.setProperty("animation", original_animation);
        reset_button.style.setProperty("opacity", 0);
    }

    div.addEventListener('mousedown', disable_cube_animation);
    div.addEventListener('touchstart', disable_cube_animation);
    div.addEventListener('mouseup', reset_mouse_position);
    div.addEventListener('touchend', reset_mouse_position);
</script>
