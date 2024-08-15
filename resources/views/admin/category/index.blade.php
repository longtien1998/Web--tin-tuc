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
                    <a href="{{route('admin.category')}}">Tất cả loại tin</a>
                </li>
            </ul>
        </div>
        <h3 class="fw-bold mb-3">Quản lý loại tin</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thêm loại tin</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                                Thêm loại tin
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            <span class="fw-mediumbold"> Thêm</span>
                                            <span class="fw-light"> loại tin </span>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('admin.category.store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="small">Tạo một loại tin mới bằng biểu mẫu này, hãy đảm bảo bạn điền đầy đủ thông tin</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tên loại tin</label>
                                                        <input id="addName" name="ten" type="text" class="form-control" placeholder="Tên loại tin" required />
                                                        @error('ten')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Ngôn ngữ</label>
                                                        <!-- <input id="addPosition" type="text" class="form-control" placeholder="Ngôn ngữ" /> -->
                                                        <select name="lang" id="lang" class="form-control" required>
                                                            <option value="">Chọn ngôn ngữ</option>
                                                            <option value="vi">Tiếng Việt</option>
                                                            <option value="en">Tiếng Anh</option>
                                                        </select>
                                                        @error('lang')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Url</label>
                                                        <input id="addOffice" type="text" name="url" class="form-control" placeholder="Url" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value='Lưu' />
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="categoryTable">
                            <table
                                id="add-row"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 9%">Ngôn ngữ</th>
                                        <th>Tên</th>
                                        <th>Url</th>
                                        <th style="width: 15%">Ngày Thêm</th>
                                        <th style="width: 12%">Thứ tự</th>
                                        <th style="width: 10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Ngôn ngữ</th>
                                        <th>Tên</th>
                                        <th>Url</th>
                                        <th>Ngày Thêm</th>
                                        <th>Thứ tự</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ( $data as $category )
                                    <tr>
                                        <td>{{$category->lang}}</td>
                                        <td>{{$category->ten}}</td>
                                        <td>{{$category->url}}</td>
                                        <td>{{$category->created_at->format('d-m-Y H:i:s' )}}</td>
                                        <td>{{$category->thuTu}}
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-toggle="modal" data-index="{{$category->id}}" class="btn btn-link btn-primary btn-lg edit" data-bs-target="#exampleModal1">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="{{route('admin.category.delete',['id'=>$category->id])}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" onclick="return confirm('Xác nhận xóa ?')" data-original-title="Remove">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết loại tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="profile-img mx-auto bg-blue rounded-circle">
                        <img src="" alt="" class="bg-primary">
                    </div>
                    <div class="profile-body">
                        <form action="" method="post" id="formedit">
                            @csrf
                            @method('PUT')
                            <div class="modal-body " style="overflow-y: visible;">
                                <div class="row ">
                                    <input id="idlt" name="id" type="text" class="form-control" hidden />
                                    <div class="col-sm-12 ">
                                        <div class="form-group form-group-default">
                                            <label>Tên loại tin</label>
                                            <input id="tenlt" name="ten" type="text" class="form-control" required />
                                            @error('ten')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <div class="form-group form-group-default">
                                            <label>Url</label>
                                            <input id="urllt" type="text" name="url" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-group-default">
                                            <label>Ngôn ngữ</label>
                                            <!-- <input id="addPosition" type="text" class="form-control" placeholder="Ngôn ngữ" /> -->
                                            <select name="lang" class="form-control" required>
                                                <option  id="langlt"  selected></option>
                                                <option value="vi">Tiếng Việt</option>
                                                <option value="en">Tiếng Anh</option>
                                            </select>
                                            @error('lang')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group form-group-default">
                                            <label>Số thứ tự</label>
                                            <input id="thuTult" type="number" name="thuTu" class="form-control"  />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value='Lưu' />
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.edit').forEach(deleteLink => {
        deleteLink.addEventListener('click', function(event) {

            const dataIndex = this.getAttribute('data-index');

            fetchData(dataIndex);
        });
    });
    // Hàm lấy dữ liệu từ API
    async function fetchData(dataIndex) {

        const apiUrl = 'http://127.0.0.1:8000/api/ql-loaitin/' + dataIndex;
        try {
            const response = await fetch(apiUrl, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    // Nếu API yêu cầu token CSRF, thêm nó vào header
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            // Kiểm tra nếu phản hồi thành công
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            // Chuyển đổi phản hồi thành JSON
            const data = await response.json();

            // Hiển thị dữ liệu trong console hoặc xử lý dữ liệu
            console.log(data['data'].id);
            document.getElementById('formedit').action = 'category/'+data['data'].id+'/update';
            document.getElementById('idlt').value = data['data'].id;
            document.getElementById('tenlt').value = data['data'].ten;
            document.getElementById('urllt').value = data['data'].url;
            document.getElementById('langlt').value = data['data'].lang;
            data['data'].lang =='vi' ? document.getElementById('langlt').innerText = 'Tiếng việt' : document.getElementById('langlt').innerText = 'Tiếng anh';
            document.getElementById('thuTult').value = data['data'].thuTu;

            // Thêm logic để hiển thị dữ liệu lên giao diện nếu cần
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }
</script>
