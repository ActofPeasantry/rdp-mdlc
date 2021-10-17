{{-- Title --}}
<div class="form-group mb-3">
    <label class="form-label" for="title">Judul Materi</label>
    <input id="title"  name="title" type="text" class="form-control"
    value="{{ old('title') }} @isset($user) {{$study->title}}  @endisset"
    required autocomplete="title">
</div>

{{-- Abstract --}}
<div class="form-group mb-3">
    <label class="form-label" for="abstract">Abstraksi Materi</label>
    {{-- <textarea name="text" id="text" cols="30" rows="10"></textarea> --}}
    <textarea class="form-control "name="abstract" id="abstract" cols="30" rows="15" required>
        {{ old('abstract') }} @isset($user) {{$study->abstract}}  @endisset
    </textarea>
</div>

{{-- Description --}}
<div class="form-group mb-3">
    <label class="form-label" for="description">Isi Materi Belajar</label>
    {{-- <textarea name="text" id="text" cols="30" rows="10"></textarea> --}}
    <textarea class="form-control "name="description" id="description" cols="30" rows="50" required>
        {{ old('description') }} @isset($user) {{$study->description}}  @endisset
    </textarea>
</div>

<input type="hidden"  id="classroom_id" name="classroom_id" value="{{ $classroom->id }}">

