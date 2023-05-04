<x-master-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 py-4">
            <div class="card">
                <div class="card-header">Détails Type Congés</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <img src="/images/expat.png" alt="" class="img-fluid" width="150" height="150">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $leaveType->title }}</h5>
                            <p class="card-text">{{ $leaveType->description }}</p>
                            <p class="card-text, text-primary">{{ $leaveType->active ? 'Activé' : 'Désactivé' }}</p>
                            <a href="" class="btn btn-primary">Editer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master-layout>