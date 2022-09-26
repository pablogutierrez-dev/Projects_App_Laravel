@csrf

@if($project->image)
    <img src="/storage/{{ $project->image }}" style="height: 250px; object-fit: cover"  class="card-img-top mb-2" alt="{{ $project->title }}">
@endif

<div class="mb-3">
    <label for="formFile" class="form-label"></label>
    <input name="image" class="form-control" type="file" id="formFile">
</div>

<div class="form-group">
    <label for="category_id" class="fw-bold">Categoria del Articulo</label>
    <select name="category_id" id="category_id" class="form-select border-0 bg-light shadow-sm mb-3">
        <option value="">Seleccionar</option>
        @foreach($categories as $id => $name)
        <option    
            value="{{ $id }}" 
            @if($id == old('category_id', $project->category_id)) selected @endif>
            {{ $name }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label class="fw-bold" for="title">Titulo del Proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="title" type="text" name="title" placeholder="Titulo" value="{{ old('title', $project->title) }}">
</div>

<div class="form-group mb-3">
    <label class="fw-bold" for="url">URL del Proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="url" type="text" name="url" placeholder="Url" value="{{ old('url', $project->url) }}">
</div>

<div class="form-group mb-3">
    <label class="fw-bold" for="description">Descripcion del Proyecto</label>
    <textarea class="form-control border-0 bg-light shadow-sm" id="description" name="description" placeholder="Descripcion">{{ old('description', $project->description) }}</textarea>
</div>

<button class="btn btn-primary btn-lg text-white w-100 mb-2">{{ $btnText }}</button>
<a class="btn btn-link w-100 text-decoration-none p-2" href="{{ route('projects.index') }}">Cancelar</a>
