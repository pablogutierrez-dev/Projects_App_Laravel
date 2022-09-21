@csrf
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
