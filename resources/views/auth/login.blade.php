<x-monheader>

</x-monheader>
<body>
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Bootstrap
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"                              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
               <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
               </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
            </ul>
        <div class="d-flex">

         @if (Route::has('login'))
         @auth
         <a href="{{ url('/dasboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
         @else
           <a href="{{ route('login') }}" class='btn btn-outline-infos rounded-pill'>
           <i class='fa fa-user me-1'></i>
           Connexion
           </a>
           @if (Route::has('register'))
           <a href="{{ route('register') }}" class='btn btn-outline-infos rounded-pill ms-2'>
           <i class='fa fa-user-plus me-1'></i>
           Inscription
           </a>
           @endif
           @endauth
       
           @endif
        </div>
       </div>
     </div>
   </nav> 
<x-app-layout>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
<div class="login-page bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <h3 class="mb-3 text-center">Connexion</h3>
          <div class="bg-white shadow rounded">
    <div class="row">
      <div class="col-md-7 pe-0">
        <div class="form-left h-100 py-5 px-5">
         <form method="POST" action="{{ route('login') }}" class="row g-4">
            @csrf
            <div class="col-12">
              <label>Email<span class="text-danger">*</span></label>
               <div class="input-group">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
                 <input id="email" type="email" name="email" class="form-control" placeholder="Entrer votre email" required autofocus autocomplete="email">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                   </div>
                    </div>

            <div class="col-12">
              <label>Password<span class="text-danger">*</span></label>
                <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-lock"></i></div>
                  <input id="password" type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required autocomplete="current-password">
                   <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    </div>

            <div class="col-sm-6">
             <div class="form-check">
              <input class="form-check-input" id="remember_me" type="checkbox" id="inlineFormCheck" name="remember">
               <label class="form-check-label" for="inlineFormCheck">{{ __('login.remember') }}</label>
                </div>
                 </div>

            <div class="col-sm-6">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="float-end text-primary">{{ __('login.forgot') }}</a>
                @endif
            </div>

            <div class="col-12">
               <button type="submit" class="btn btn-warning px-4 float-end mt-4 text-white">{{ __('login.login') }}</button>
            </div>
        </form>
      </div>
    </div>
<div class="col-md-5 ps-0 d-none d-md-block">
    <div class="form-right h-100 bg-warning text-white text-center pt-5">
    <img src="images/expat.png" width="200" height="200"></img>
        <h2 class="fs-1">Bienvenue!!!</h2>
    </div>
</div>
</div>
</div>
 <a href="https://www.expat-dakar.com/" class="float-end text-warning mt-3">EXPAT-DAKAR.com</a>
</div>
</div>
</div>
</div>

    <!-- Bootstrap JS -->

     <!-- <div class="row mt-4 pt-4 bg-white shadow-sm">
     <h3 class="card-title text-center">Se connecter</h3>
        <div class="col-6">
        <img src="images/undraw_Authentication_re_svpt.png" width="300" height="300"></img>
        </div>
        <div class=" mb-3 col-6">
            
                <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
                </div>
            </div> -->
          
          



          




        <!-- <form  method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('login.remember') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('login.forgot') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('login.login') }}
            </x-primary-button>
        </div>
    </form> -->
        <!-- </div>
     </div> -->
    </x-app-layout>
    <x-monbody>

    </x-monbody>

</body>

