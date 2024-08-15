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
                    <a href="#">Quản lý loại tin</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.blog')}}">Tất cả bài viết</a>
                </li>
            </ul>
        </div>
        <h3 class="fw-bold mb-3">Quản lý bài viết</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thêm bài viết</h4>
                            <a class="btn btn-primary btn-round ms-auto" href="{{route('admin.blog.create')}}">
                                <i class="fa fa-plus"></i>
                                Thêm bài viết
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="blogTable">
                            <table
                                id="add-row"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 9%">Ngôn ngữ</th>
                                        <th>Tiêu đề</th>
                                        <th>Url</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Loại tin</th>
                                        <th>Người đăng</th>
                                        <th>Số lần xem</th>
                                        <th>Nổi bật</th>
                                        <th>Ẩn/hiện</th>
                                        <th style="width: 15%">Ngày Thêm</th>
                                        <th style="width: 7%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Ngôn ngữ</th>
                                        <th>Tiêu đề</th>
                                        <th>Url</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Loại tin</th>
                                        <th>Người đăng</th>
                                        <th>Số lần xem</th>
                                        <th>Nổi bật</th>
                                        <th>Ẩn/hiện</th>
                                        <th>Ngày Thêm</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ( $data as $blog )
                                    <tr>
                                        <td>{{$blog->lang}}</td>
                                        <td>{{Str::limit($blog->tieuDe, 20, '...')}}</td>
                                        <td>{{Str::limit($blog->url, 20, '...')}}</td>
                                        <td>
                                            <img src="..\{{$blog->hinhAnh}}" alt="" width="90">
                                        </td>
                                        <td>{{\App\Models\Theloaitin::find($blog->loaiTinId)->ten}}</td>
                                        <td>{{\App\Models\User::find($blog->nguoiDangId)->name}}</td>
                                        <td>{{$blog->soLanXem}}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="noiBat" role="switch" value="1" id="flexSwitchCheckDefault" {{$blog->noiBat == 1 ? 'Checked' : ''}}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="anHien" role="switch" value="1" id="flexSwitchCheckDefault" {{$blog->anHien == 1 ? 'Checked' : ''}}>
                                            </div>
                                        </td>

                                        <td>{{$blog->created_at->format('d-m-Y H:i:s' )}}</td>

                                        <td>
                                            <div class="form-button-action">
                                                <a type="button" href="{{route('admin.blog.edit',['id'=>$blog->id])}}" class="btn btn-link btn-primary btn-lg edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Chỉnh sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('admin.blog.delete',['id'=>$blog->id])}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Xóa" title="" class="btn btn-link btn-danger" onclick="return confirm('Xác nhận xóa ?')" data-original-title="Remove">
                                                        <i class="fa fa-times mt-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


