<x-monheader>

</x-monheader>
<body>
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Bootstrap
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
<div class="register-page bg-light">
  <div class="container">
    <div class="row pt-4">
      <div class="col-lg-10 offset-lg-1">
        <h3 class="mb-3 text-center">Inscription</h3>
          <div class="bg-white shadow rounded">
    <div class="row">
      <div class="col-md-7 pe-0">
        <div class="form-left h-100 py-5 px-5">
         <form method="POST" action="{{ route('register') }}" class="row g-4 mt-4">
            @csrf
                <div class="class">
                 <div class="col-12">
                 <label class="form-label" for="form3Example1n">{{ __('register.title') }}</label>
                 <select class="form-select" aria-label="Default select example" name="title">
                  <option value="">Veuillez sélectionner une option</option>
                  @foreach(config('employees.titles') as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                 </select>
                 <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                </div>
                
                <div class="row mt-4" >
                  <div class="col-md-6 mb-4">
                  <label class="form-label" for="form3Example1m">{{ __('register.firstName') }}</label>
                  <input type="text" id="firstName" name="firstName" class="form-control" required autofocus autocomplete="firstName" />
                  <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                  </div>
                  <div class="col-md-6 mb-4">
                    <label class="form-label" for="form3Example1n">{{ __('register.lastName') }}</label>
                    <input type="text" id="lastNmae" name="lastName" class="form-control" required autofocus autocomplete="lastName" /> 
                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label class="form-label" for="form3Example1m">Email</label>
                      <input type="email" id="email" name="email" class="form-control" required autofocus autocomplete="email" /> 
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                  <div class="col-md-6 mb-4">
                    <label class="form-label" for="form3Example1n">Password</label>
                      <input type="password" id="password" name="password" class="form-control" required autofocus autocomplete="password" /> 
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label class="form-label" for="form3Example1m">{{ __('register.confirm') }}</label>
                      <input  id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />  
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
                  <div class="col-md-6 mb-4">
                    <label class="form-label" for="form3Example1n">{{ __('register.phone') }}</label>
                    <input  id="number" class="form-control" type="text" name="phone_number" required autofocus autocomplete="number" />
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                  </div>
                </div>

                 <div class="row">
                <div class="col-12 ">
                    <label class="form-label" for="form3Example1n">{{ __('register.position') }}</label>
                    <input  id="position" class="form-control" type="text" name="position" required autofocus autocomplete="postion" />
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                  </div>
                  </div>
               
                <div class="col-sm-6">
                 <a href="{{ route('register') }}" class="text-end text-primary">{{ __('register.validation') }}</a>
                 </div>
                <div class="col-sm-6"> 
                <button type="submit" class="btn btn-warning px-4 float-end mt-4 text-white">{{ __('register.register') }}</button>  
                
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
 </x-app-layout>
<x-monbody>

</x-monbody>

</body>


