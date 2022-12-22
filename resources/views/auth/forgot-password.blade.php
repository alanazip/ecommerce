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
    <div class="contents">
        <br>
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
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <br><br><br><br><br><br><br>
            <div>
                <h3 class="contents-header">Esqueceu sua senha? Sem problemas. 
                Apenas informe seu e-mail e nós enviaremos 
                uma novo link para que você possa redefinir sua senha </h3><br>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div>
                <label for="email" :value="__('Email')" class="gray">E-mail</label><br><br>
                <input type="email" name="email" :value="old('email')" required autofocus class="white shadow" id="crafting-recipes"><br><br>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <button style="height: 60px;" class="minecraft-btn mx-auto w-64 
			text-center text-white truncate p-1 
			border-2 border-b-4 hover:text-yellow-200" align="center">{{ __('Email Password Reset Link') }}</button><br><br>
            </div>
            <br><br>
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