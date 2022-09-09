<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$movie->title ?? ""}}" required>
        @if ($errors->has('title'))
            <div class="error">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" rows="5" id="summernote1" class="form-control" value="{{$movie->description  ?? ""}}" required>{!! $movie->description ??"" !!}</textarea>
        @if ($errors->has('description'))
            <div class="error">{{ $errors->first('description') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Poster  @isset($movie) ( <span class="text-small text-bold">{{$movie->poster}}</span> ) @endisset </label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="poster" id="exampleInputFile"
                    required>
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>

        </div>
        @if ($errors->has('poster'))
            <div class="error">{{ $errors->first('poster') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Release Date</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="date" class="form-control" name="release_date" id="exampleInputFile" value="{{$movie->release_date  ?? ""}}"
                    required>
            </div>

        </div>
        @if ($errors->has('release_date'))
            <div class="error">{{ $errors->first('release_date') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control" required>
            <option value="publish" @isset($movie) @if($movie->status === "publish") selected @endif @endisset>Publish</option>
            <option value="unpublish" @isset($movie) @if($movie->status === "unpublish") selected @endif @endisset>Unpublish</option>
        </select>
        @if ($errors->has('status'))
            <div class="error">{{ $errors->first('status') }}</div>
        @endif
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>