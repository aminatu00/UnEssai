@extends('layouts.template')
@section('content')

<div class="col-md-6">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-6 mb-1" style="background-color:#081b29;">
            <a href="{{ route('categorie.show', ['id' => $category->id, 'category_id' => $category->id]) }}" class="category-link">
                <div class="card square-card">
                    <div class="card-body" style="background-color:#081b29; border: 1px solid #0ef;">
                        <h3 class="card-title text-white" style="font-size:30px">{{ $category->nom }}</h3>
                        @if(strpos($category->nom, 'reseau') !== false && strpos($category->nom, 'informatique') !== false)
                            <img src="assets/img/reseau.png" alt="" style="width: 150px; height: 150px;margin-left:25px;">
                            <img src="assets/img/informatique.png" alt="" style="width: 150px; height: 150px;margin-left:25px;">
                        @elseif(strpos($category->nom, 'reseau') !== false)
                            <img src="assets/img/reseau.png" alt="" style="width: 150px; height: 163px;margin-left:25px;margin-top: -10px; ">
                        @elseif(strpos($category->nom, 'informatique') !== false)
                            <img src="assets/img/informatique.png" alt="" style="width: 150px; height: 150px;margin-left:25px;">
                        @endif
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
