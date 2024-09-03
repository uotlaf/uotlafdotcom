@php use App\Models\Art; @endphp
@php use App\Models\Theme; @endphp
<header class="flex flex-row rounded-lg overflow-hidden aspect-[4/1] md:aspect-[6/1] lg:aspect-[8/1]">
    <button class="mx-3 lg:hidden" onclick="switch_left_menu()">
        @include('components/image',
            ['class' => "w-8 md:w-16 aspect-square",
             'source' => Theme::get('home_bottom'),
             'alt' => 'Hamburguer menu',
             'width_disc' => 1])
    </button>
    <div class="relative rounded-lg overflow-hidden content-center h-full w-full flex justify-center">
        @include('components/image', ['class' => "absolute top-0 h-full w-full object-cover select-none", 'source' => Art::randomBanner(), 'alt' => 'Banner', 'width_disc' => 1.2])
        <span class="md:text-5xl text-slate-50 relative z-10 lg:ml-4 select-none mx-auto content-center"
              style="text-shadow: 2px 2px 2px black">{{__("default.site_name")}}</span>
    </div>
    <button class="mx-3 lg:hidden" onclick="switch_right_menu()">
        @include('components/image',
            ['class' => "w-8 md:w-16 aspect-square",
             'source' => Theme::get('hamburguer'),
             'alt' => 'Hamburguer menu',
             'width_disc' => 1])
    </button>
</header>

<script>
    function switch_left_menu() {
        let left = document.getElementById('left_card');
        let right = document.getElementById('right_card');
        let center = document.getElementById('center_card');
        if (left.classList.contains('hidden')) {
            // Está escondido
            right.classList.add('hidden');
            center.classList.add('hidden');
            left.classList.remove('hidden');
        } else {
            center.classList.remove('hidden');
            left.classList.add('hidden');
        }
    }

    function switch_right_menu() {
        let left = document.getElementById('left_card');
        let right = document.getElementById('right_card');
        let center = document.getElementById('center_card');
        if (right.classList.contains('hidden')) {
            // Está escondido
            left.classList.add('hidden');
            center.classList.add('hidden');
            right.classList.remove('hidden');
        } else {
            center.classList.remove('hidden');
            right.classList.add('hidden');
        }
    }
</script>
