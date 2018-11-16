
<div >
	<div >
		<label for="title">Title</label>
		<input type="text"  id="title" placeholder="Title" name="title" class="form-control"  value="{{$post->title}}">
  </div>

   <div >
		<label for="body">Body</label>
		<textarea id="body" placeholder="Body"name="body"   class="form-control"  rows="10"  >{{$post->body}}</textarea>
	</div>
</div>
