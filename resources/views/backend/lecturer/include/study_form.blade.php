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

@isset($edit)
    <div class="form-group mb-3">
        <label for="video">Uploaded Video</label> <br>
        @if ($study->video_file != null)
            <video width="360" height="280" controls>
                <source src="{{ $study->video_file }}" type="video/mp4">
                <source src="{{ $study->video_file }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        @else
            Tidak ada video
        @endif
    </div>
@endisset

<div class="form-group mb-3">
    <label class="" for="video">Upload file video (opsional)</label> <br>
    <input type="file"  class="form-control-file" name="videoFile" id="videoFile" accept="video/*">
</div>

@isset($edit)
    <div class="form-group mb-3">
        <label for="video">Uploaded Audio</label> <br>
        @if ($study->audio_file != null)
            <audio width="360" height="280" controls>
                <source src="{{ $study->audio_file }}" type="audio/mpeg">
                <source src="{{ $study->audio_file }}" type="audio/ogg">
                Your browser does not support the video tag.
            </audio>
        @else
            Tidak ada Audio
        @endif
    </div>
@endisset

<div class="form-group mb-3">
    <label class="" for="video">Upload file Audio (opsional)</label> <br>
    <input type="file" class="form-control-file" name="audioFile" id="audioFile"  accept="audio/*">
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
