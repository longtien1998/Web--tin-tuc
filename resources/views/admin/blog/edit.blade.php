<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

<!-- If you are using premium features: -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.0.0/ckeditor5-premium-features.css" />

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Quản lý bài viết</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.blog')}}">Tất cả bài viết</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.blog')}}">Chỉnh sửa bài viết</a>
                </li>
            </ul>
        </div>
        <h3 class="fw-bold mb-3">Chỉnh bài viết</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Chỉnh sửa bài viết của bạn</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.blog.update',['id'=>$blog->id])}}" method="post" id="exampleValidation" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 col-lg-12 ">
                                    <div class="form-group form-show-validation">
                                        <label for="tieude">Tiêu đề <span class="required-label">*</span></label>
                                        <input type="text" class="form-control form-control-lg" id="tieuDe" name="tieuDe" placeholder="Nhập tiêu đề cho bài viết" value="{{$blog->tieuDe}}">
                                        @error('tieuDe')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Url bài viết</label>
                                        <input type="text" class="form-control form-control-lg" id="url" name="url" placeholder="Bạn có thể nhập hoặc không địa chỉ url của bài viết" value="{{$blog->url}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mota">Tóm tắt mô tả <span class="required-label">*</span></label>
                                        <textarea class="form-control form-control-lg" id="mota" rows="5" name="moTa" placeholder="Mô tả ngắn gọn bài viết của bạn" >{{$blog->moTa}}</textarea>
                                        @error('moTa')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="noidung">Nội dung bài viết <span class="required-label">*</span></label>
                                        <textarea name="noiDung" id="summernote" class="form-control form-control-lg" name="noidung" rows="50" >{{$blog->noiDung}}</textarea>
                                        @error('noiDung')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="row m-0">
                                        <div class="form-group col-lg-6">
                                            <label for="defaultSelect">Loại tin <span class="required-label">*</span></label>
                                            <div class="" data-select2-id="5">
                                                <div class="select2-input" data-select2-id="4">
                                                    <select id="state1" name="loaiTinId" class="form-control form-control-lg">
                                                        <option value="">Chọn thể loại tin</option>
                                                        @foreach ($loaitins as $loaitin)
                                                        <option value="{{$loaitin->id}}" {{$loaitin->id === $blog->loaiTinId ? 'selected' : ''}}>{{$loaitin->ten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="defaultSelect">Ngôn ngữ <span class="required-label">*</span></label>
                                            <div class="" data-select2-id="5">
                                                <div class="select2-input" data-select2-id="4">
                                                    <select id="state2" name="lang" class="form-control form-control-lg">
                                                        <option value="{{$blog->lang}}" selected>{{$blog->lang == 'vi' ? 'Tiếng việt' : 'Tiếng anh'}}</option>
                                                        <option value="">Chọn ngôn ngữ</option>
                                                        <option value="vi">Tiếng việt</option>
                                                        <option value="en">Tiếng anh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="row justify-content-center">
                                        <div class=" col-lg-6">
                                            <div class="form-check form-switch">
                                                <p>Ẩn/hiện bài viết</p>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Ẩn bài viết</label>
                                                <input class="form-check-input" type="checkbox" name="anHien" role="switch" value="1" id="flexSwitchCheckDefault" {{$blog->anHien === 1 ? 'checked' : ''}}>
                                            </div>
                                        </div>
                                        <div class=" col-lg-6">
                                            <div class="form-check form-switch">
                                                <p>Nổi bật bài viết</p>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">nổi bật</label>
                                                <input class="form-check-input" type="checkbox" role="switch" name="noiBat" value="1" id="flexSwitchCheckDefault"  {{$blog->noiBat === 1 ? 'checked' : ''}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="tags">tangs</label>
                                        <input type="text" name="tags" class="form-control form-control-lg" id="tags" placeholder="Nhập tags cho bài viết" value="{{$blog->tags}}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group form-show-validation row">
                                        <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Ảnh đại diện <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <div class="input-file input-file-image">
                                                <img class="img-upload-preview rounded" id="imagePreview" alt="preview" src="{{asset($blog->hinhAnh)}}">
                                                <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" >
                                                <input type="hidden" name="hinhAnh" value="{{$blog->hinhAnh}}">
                                                <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Tải một ảnh đại diện</label>
                                            </div>
                                        </div>
                                        @error('uploadImg')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Lưu</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


