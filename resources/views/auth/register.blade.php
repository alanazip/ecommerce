<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Faça seu login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="img/favicon.ico" rel="icon">

</head>

<body>
    <div style="width: 500px; max-width: 5000px;" class="contents">
        <div class="scene">
            <div class="cube">
                <div class="cube__face cube__face--left"></div>
                <div class="cube__face cube__face--right"></div>
                <div class="cube__face cube__face--top"></div>
                <div class="cube__face cube__face--bottom"></div>
                <div class="cube__face cube__face--front"></div>
                <div class="cube__face cube__face--back"></div>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <br><br><br><br><br>
            <div>
                <h2 class="contents-header">Faça seu cadastro </h2><br><br>
            </div>
            <div>
                <label for="name" :value="__('Name')" class="gray">Nome</label><br><br>
                <input type="name" name="name" :value="old('name')" required autofocus class="white shadow" id="crafting-recipes"><br><br>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="email" :value="__('Email')" class="gray">E-mail</label><br><br>
                <input type="email" name="email" :value="old('email')" required autofocus class="white shadow" id="crafting-recipes"><br><br>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            

            <div>
                <label for="password" :value="__('Password')" class="gray">Senha</label><br><br>
                <input type="password" name="password" :value="old('password')" 
                required autocomplete="new-password" class="white shadow" id="crafting-recipes"><br><br>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" :value="__('Confirm Password')" class="gray">Confirmar Senha</label><br><br>
                <input type="password" name="password_confirmation" 
                required class="white shadow" id="crafting-recipes"><br><br>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <a href="{{ route('login') }}" style="color:red;">Ja é registrado?</a>
            <br><br>

            <div>
                <button style="height: 60px;" class="minecraft-btn mx-auto w-64 
			text-center text-white truncate p-1 
			border-2 border-b-4 hover:text-yellow-200" align="center">Regsitrar-se</button><br><br>
            </div>
				<div class="flex items-center justify-end mt-4">
				<a class="underline text-sm text-gray-600 hover:text-gray-900
                     rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 
					 focus:ring-indigo-500" href="{{ route('site.home') }}"  style="color:white;" onMouseOver="this.style.color='yellow'"
   onMouseOut="this.style.color='white'">
					{{ __('Voltar a tela inicial') }}
				</a>
        </form>
    </div>

</body>

</html>
