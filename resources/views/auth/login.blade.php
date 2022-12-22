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
		<div class="scene">
			<div class="cube">
				<div class="cube__face cube__face--left"></div>
				<div class="cube__face cube__face--right"></div>
				<div class="cube__face cube__face--top"></div>
				<div class="cube__face cube__face--bottom"></div>
				<div class="cube__face cube__face--front"></div>
				<div class="cube__face cube__face--back"></div>
			</div>
		</div><br><br><br><br><br>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<br><br>
			<h2 class="contents-header">Faça seu login</h2><br><br>

			<div>
				<x-auth-session-status class="mb-4" :status="session('status')" />
				<label for="email" :value="__('Email')" class="gray">E-mail</label><br><br>
				<input type="email" name="email" :value="old('email')" required autofocus class="white shadow" id="crafting-recipes"><br><br>

				<x-input-error :messages="$errors->get('email')" class="mt-2" />
			</div>


			<div>
				<label for="password" :value="__('Password')" class="gray">Senha</label><br><br>
				<input type="password" name="password" required autocomplete="current-password" class="white shadow" id="crafting-recipes"><br><br><br>
			</div>

			<div class="block mt-4">
				<label for="remember_me" class="inline-flex items-center">
					<input id="remember_me" 
					style="margin-right: 300px; margin-top: -100px" 
					type="checkbox" class="rounded border-gray-300 text-indigo-600 
					shadow-sm focus:ring-indigo-500" name="remember">
					<span 
					style=" position: absolute; margin-right: 500px; margin-top: -50px;">{{ __('Remember me') }}</span>
				</label>
				<br><br>
			</div>
			<div class="flex items-center justify-end mt-4">
				@if (Route::has('password.request'))
				<a class="underline text-sm text-gray-600 hover:text-gray-900 
                    rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}"style="color: red;">
					{{ __('Forgot your password?') }}
				</a>
				<br><br>
				@endif
				<button class="minecraft-btn mx-auto w-64 
			text-center text-white truncate p-1 
			border-2 border-b-4 hover:text-yellow-200" align="center">Entrar</button><br><br>
			</div>
			<div class="flex items-center justify-end mt-4">
				<a class="underline text-sm text-gray-600 hover:text-gray-900
                     rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 
					 focus:ring-indigo-500" href="{{ route('register') }}"  style="color:yellow;" onMouseOver="this.style.color='red'"
   onMouseOut="this.style.color='yellow'">
					{{ __('Ainda não é cadastrado?') }}
				</a>            <br><br>
				<div class="flex items-center justify-end mt-4">
				<a class="underline text-sm text-gray-600 hover:text-gray-900
                     rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 
					 focus:ring-indigo-500" href="{{ route('site.home') }}"  style="color:white;" onMouseOver="this.style.color='yellow'"
   onMouseOut="this.style.color='white'">
					{{ __('Voltar a tela inicial') }}
				</a>
			</div>
		</form>
	</div>

</body>

</html>