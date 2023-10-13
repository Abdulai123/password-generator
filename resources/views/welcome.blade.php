<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>Strong Password Generator In Laravel</title>
</head>
<body>
    <h1>Password Generator Using Laravel</h1>
    <div id="container">
        <h3>Select Password Strength</h3>

        <form action="/" method="post">
            @csrf

            <div class="options">
                <span>1. Include Uppercase Letters [A - Z] : </span>
                <input type="checkbox" name="A_Z" id="" checked>
            </div>
            <div class="options">
                <span>2. Include Lowercase Letters [a - z] : </span>
                <input type="checkbox" name="a_z" id="" checked>
            </div>
            <div class="options">
                <span>4. Include Characters [@#$%...] : </span>
                <input type="checkbox" name="characters" id="" checked>
            </div>
            <div class="options">
                <span>3. Include Numbers [0 - 9]: </span>
                <input type="checkbox" name="0_9" id="" checked>
            </div>

            {{-- <div class="leng"> --}}
                <input type="number" name="password_length" placeholder="Password Length ( Default 16 )">
            {{-- </div> --}}

            @isset($password)
                <input type="text" name="gen-pass" class="gen-pass" value="{{$password}}">
                <p>
                    @if ($strength <= 2)
                        Weak Password
                    @elseif ($strength === 3)
                        Good Password
                    @else
                        Strong Password
                    @endif
                </p>
            @endisset
            <button type="submit" class="bn39"><span class="bn39span">Generate</span></button>
        </form>


        <p>Created with ❤️ by Abdulai ©️ 13/10/2023</p>
    </div>
</body>
</html>