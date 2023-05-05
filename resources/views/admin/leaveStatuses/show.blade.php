<x-master-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 py-4">
            <div class="card">
                <div class="card-header">Détails Status</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <img src="/images/expat.png" alt="" class="img-fluid" width="150" height="150">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><strong>Titre:  </strong>{{ $leaveStatus->title }}</h5>
                            <p class="card-text"><strong>Description:  </strong>{{ $leaveStatus->description }}</p>
                            <p class="card-text text-primary"><strong class="text-dark">Statut:  </strong>{{ $leaveStatus->active ? 'Activé' : 'Désactivé' }}</p>
                            <p class="card-text"><td><strong>Crée le:  </strong>{{ $leaveStatus->created_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
                            <p class="card-text"><td><strong>Mise à jour:  </strong>{{ $leaveStatus->updated_at->locale('fr_FR')->isoFormat('LLLL') }}</td></p>
                            <a href="" class="btn btn-primary">Editer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master-layout>