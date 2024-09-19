@php use App\Models\Art; @endphp
@php use App\Models\Theme; @endphp

<div class="relative rounded-lg overflow-hidden content-center h-full w-full flex flex-row justify-center">
    <button id="navbar_left_button" class="z-10 px-3 lg:hidden bg-gradient-to-r from-gray-900" onclick="switch_left_menu()">
        @include('components/image',
            ['class' => "w-8 md:w-16 aspect-square",
             'source' => Theme::get('home_bottom'),
             'alt' => 'Hamburguer menu',
             'width_disc' => 1])
    </button>
    @include('components/image', ['class' => "absolute top-0 left-0 h-full w-full object-cover select-none", 'source' => Art::randomBanner(), 'alt' => 'Banner', 'width_disc' => 1.2])
    <a class="text-xl md:text-5xl text-slate-50 relative z-10 lg:ml-4 select-none mx-auto content-center" href="/"
          style="text-shadow: 2px 2px 2px black">{{__("default.site_name")}}</a>
    <button id="navbar_right_button" class="z-10 px-3 lg:hidden bg-gradient-to-l from-gray-900" onclick="switch_right_menu()">
        @include('components/image',
            ['class' => "w-8 md:w-16 aspect-square",
             'source' => Theme::get('hamburguer'),
             'alt' => 'Hamburguer menu',
             'width_disc' => 1])
    </button>
</div>
<script>
    function switch_left_menu() {
        let left = document.getElementById('left_nav');
        let right = document.getElementById('right_nav');
        let center = document.getElementById('center');
        let footer = document.getElementsByTagName('footer')[0];
        if (left.classList.contains('hidden')) {
            // Está escondido
            right.classList.add('hidden');
            center.classList.add('hidden');
            left.classList.remove('hidden');
            left.classList.remove('w-0');
            left.classList.add('w-100');
            footer.classList.add('hidden');
        } else {
            center.classList.remove('hidden');
            left.classList.add('hidden');
            footer.classList.remove('hidden');
        }
    }

    function switch_right_menu() {
        let left = document.getElementById('left_nav');
        let right = document.getElementById('right_nav');
        let center = document.getElementById('center');
        let button = document.getElementById('navbar_right_button');
        let footer = document.getElementsByTagName('footer')[0];
        if (right.classList.contains('hidden')) {
            // Está escondido
            left.classList.add('hidden');
            center.classList.add('hidden');
            right.classList.remove('hidden');
            right.classList.remove('w-0');
            right.classList.add('w-100');
            footer.classList.add('hidden');
        } else {
            center.classList.remove('hidden');
            right.classList.add('hidden');
            footer.classList.remove('hidden');
        }
    }
</script>
