@extends('layouts.app')
@section('content')<!-- Include your CSS file -->
    <style>

        body {
            background: linear-gradient(rgba(15,23,43, .7), rgba(15,23,43, .8)), url('{{ asset('images/somasteel.jpg') }}') center center/cover;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .navbar {
        background-color: #ffffff;
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        padding: 10px 0;
        position: fixed;
        top: 0;
        left :0;
        width: 100%;
        z-index: 1000;
    }

        .container {
            text-align: center;
            width: 100%;
            max-width: 1200px;
        }

        h1 {
        margin-bottom: 20px;
        font-size: 2.5em;
        color: rgb(238, 165, 7);
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), 0 0 25px rgba(238, 165, 7, 0.5);
        background: linear-gradient(45deg, rgba(238, 165, 7, 0.8), rgba(255, 255, 255, 0.8));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between items */
            justify-content: center; /* Center items horizontally */
        }

        .bank-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 150px; /* Fixed width for each item */
            padding: 15px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            color: #333;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s, color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            opacity: 0; /* Start with invisible */
            transform: translateY(20px); /* Start with a slight translation */
        }

        .bank-link:hover {
        background-color: #ffbb00;
        color: #ffffff;
        transform: scale(1.1) translateY(-10px); /* Scale up and move up */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Deepen shadow on hover */
    }

        .bank-link img {
            width: 50px; /* Adjust the size of the image */
            height: auto;
            margin-bottom: 10px;
        }

        .bank-link span {
            font-size: 1em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: rgb(238, 165, 7)">Sélectionnez une Banque</h1>
        <ul id="bankList">
            @foreach($banks as $bankName => $route)
                <li>
                    <a href="{{ $route }}" class="bank-link">
                        <img src="{{ asset('images/bank.jpeg') }}" alt="Bank Icon">
                        <span>{{ $bankName }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bankLinks = document.querySelectorAll('.bank-link');

            bankLinks.forEach((link, index) => {
                setTimeout(() => {
                    link.style.opacity = '1'; // Fade in effect
                    link.style.transform = 'translateY(0)'; // Move to original position
                }, index * 100); // Staggered animation
            });
        });
    </script>
</body>


@endsection
