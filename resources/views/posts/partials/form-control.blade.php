<div class="form-group">
    <input type="file" name="thumbnail" id="thumbnail">
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $post->title }}">
    @error('title')
    <div class="text-danger mt-2">
        {{ $message }}
    </div>                                    
    @enderror
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select name="category" id="category" class="form-control">
        <option disabled selected>Pilih satu!</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id}}">{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category')
    <div class="text-danger mt-2">
        {{ $message }}
    </div>                                    
    @enderror
</div>
<div class="form-group">
    <label for="tags">Tag</label>
    <select name="tags[]" id="tags" class="form-control select2" multiple>
        @foreach ($post->tags as $tag)
            <option selected value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
    </select>
    @error('tags')
    <div class="text-danger mt-2">
        {{ $message }}
    </div>                                    
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
    <div class="text-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>