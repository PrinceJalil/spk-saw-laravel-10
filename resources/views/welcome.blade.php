<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="image/icon2.png" rel="icon">
    <link rel="stylesheet" href="css/stylelogin.css" />
  </head>
  <body>
    <div class="container">
      <form method="POST" action="{{ route('login') }}">
      @csrf
        <h1>Login SPK</h1>

        <div class="input-box">
          <label for="email" :value="__('Email')"/>
          <input id="email" type="text" name="email" :value="old('email')" placeholder="Username" required autofocus autocomplete="username"/>
          <i class="bx bxs-user"></i>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="input-box">
          <label for= "password" :value="__('Password')"/>
          <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password"/>
          <i class="bx bxs-lock-alt"></i>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="btn">{{ __('Login') }}</button>

      </form>
    </div>
  </body>
</html>