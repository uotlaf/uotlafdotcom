<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="pt-br">
<head>
    <title>Rise and Shine, Mr. Freeman</title>
    <style>
        /* PC */
        @media screen and (min-width: 720px) {
            #code {
                font-size: 4vw;
            }

            #journal {
                width: 100vw;
            }

            #hellga {
                height: 100vh;
            }

            #text {
                width: 50vw;
            }
        }

        /* Celular */
        @media screen and (max-width: 720px) {
            #code {
                font-size: 10vw;
            }

            #journal {
                height: 100vh;
            }

            #hellga {
                width: 100vw;
            }

            #text {
                width: 100vw;
            }
        }

        /* Geral */
        #code {
            color: white;
            font-weight: bold;
            animation-name: changeFont;
            animation-duration: 8s;
            animation-iteration-count: infinite;
            animation-delay: 1s;
        }

        .parallax {
            position: relative;
            transition: transform 0.25s ease-out;
            background-repeat: no-repeat;
        }

        #hellga {
            object-fit: contain;
        }

        #back {
            background-size: contain;
            background-position: top right;
        }

        #journal {
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: flex-end;
        }

        #bg {
            width: 100vw;
            height: 100vh;
            position: absolute;
            z-index: 0;
        }

        body {
            display:flex;
            flex-direction: row;
            margin: 0;
            background-color: black;
            overflow: hidden;
        }

        #text {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        /* Animações */
        @keyframes changeFont {
            10% {
                font-family: cursive;
            }
            20% {
                font-family: 'Arial', ui-serif;
            }
            30% {
                font-family: "Verdana", cursive;
            }
            40% {
                font-family: "Tahoma", serif;
            }
            50% {
                font-family: "TreBuchet MS", serif;
            }
            60% {
                font-family: "Times New Roman", serif;
            }
            70% {
                font-family: "Georgia", serif;
            }
            80% {
                font-family: "Garamond", serif;
            }
            90% {
                font-family: "Courier New", serif;
            }
            100% {
                font-family: "Brush Script MT", serif;
            }
        }
    </style>
</head>
<body>
<div id="bg" class="parallax">
    <div id="journal" class="parallax" style="background-image: url({{\App\Models\Theme::get('error_bg.avif')}})">
        <div id="back" class="parallax " style="background-image: url({{\App\Models\Theme::get('error_hellga_bg.avif')}})">
            <img id="hellga" src="{{\App\Models\Theme::get('error_hellga.avif')}}" alt="Hellga">
        </div>
    </div>
</div>
<div id="text">
    <h1 id="code" >@yield('error_text')</h1>
</div>
<script>
    // Itens que vamos usar
    hellga = document.getElementById("hellga");
    back = document.getElementById("back");
    journal = document.getElementById("journal");

    // Configura as funções
    document.addEventListener("mousemove", parallax);

    // Funções
    function parallax(event) {
        hellga.style.transform = `translateX(${(window.innerWidth - event.pageX) / 360}px) translateY(0px)`
        back.style.transform = `translateX(${(window.innerWidth - event.pageX) / 360}px) translateY(0px)`
        journal.style.transform = `translateX(${(window.innerWidth - event.pageX) / 1000}px) translateY(0px)`
    }
</script>
</body>
</html>

