<x-master-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 py-4">
            <div class="card">
                <div class="card-header">Détails de l'utilisateur</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/images/expat.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><strong>Prénom & Nom:  </strong>{{ $user->firstName }} {{ $user->lastName }}</h5>
                            <p class="card-text"><strong>Profession:  </strong>{{ $user->position }}</p>
                            <p class="card-text"><strong>Statut:  </strong>{{ $user->actif ? 'Actif' : 'Désactivé' }}</p>
                            <p class="card-text"><strong>Tél:  </strong>{{ $user->phone_number }}</p>
                            <p class="card-text"><strong>Email:  </strong>{{ $user->email }}</p>
                            <p class="card-text"><strong>Manager:</strong>
                                @if ($user->manager)
                                    {{ $user->manager->firstName }}
                                @else
                                    Aucun manager défini
                                @endif
                            </p>
                            <p class="card-text"><strong>Crée le:  </strong>{{ $user->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</p>
                            <a href="" class="btn btn-primary">Editer</a>
                            <a href="" class="btn btn-secondary">Mot de passe</a>
                            <a href="#" class="btn btn-danger">{{ $user->actif ? 'Désactiver' : 'Activer' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Liens présences et congés</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="" class="btn btn-primary">Présences</a>
                        </div>
                        <div class="col-md-6">
                            <a href="" class="btn btn-primary">Congés</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master-layout>