@extends('admin.master')

@section("title" , "Creat Post")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts / Create Post</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="h6 text-muted">Create New Post</h4>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('postcreate'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('postcreate') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                </div>
                <div class="card-body">
                    <form action="/admin/post/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="title"
                        placeholder="title" required value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="slug"
                        placeholder="slug" required value="{{old('slug')}}">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" name="cover"
                        placeholder="Cover" required value="{{old('cover')}}">
                        </div>

                        <div class="form-group">
                            <textarea  class="form-control form-control-user"
                                 name="excerpt"  maxlength="150" required placeholder="Excerpt...">{{old('excerpt')}}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea id="postbody"  class="form-control form-control-user body-content"
                                 name="body"  maxlength="500" required placeholder="Body...">
                                 {{old('body')}}</textarea>
                        </div>


                        <div class="form-group">
                            <select name="status" class="form-control form-control-user">
                                <option value="published" selected>Published</option>
                            <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="category_id" class="form-control form-control-user">
                                <option value="" selected>--Selected--</option>
                                @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ (old('category_id') == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="tags"
                        placeholder="Tags" required value="{{old('tags')}}">
                        </div>

                    <button onclick="this.disabled='disabled';this.closest('form').submit();" type="submit" class="btn btn-primary btn-user btn-block">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@push('footerscripts')

<script type="text/javascript" src="{{asset("js/tinymc.min.js")}}"></script>

<script type="text/javascript">

var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: '#postbody',
  plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
  mobile: {
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
  },
  menu: {
    tc: {
      title: 'Comments',
      items: 'addcomment showcomments deleteallconversations'
    }
  },
  menubar: 'file edit view insert format tools table tc help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  importcss_append: true,
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
  tinycomments_mode: 'embedded',
  content_style: '.mymention{ color: gray; }',
  contextmenu: 'link image imagetools table configurepermanentpen',
  a11y_advanced_options: true,
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default'
});



</script>

@endpush
<!-- End of Footer -->


@endsection
