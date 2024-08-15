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
                    <a href="#">Quản lý tài khoản</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.account')}}">Tất cả tài khoản</a>
                </li>
            </ul>
        </div>
        <h3 class="fw-bold mb-3">Quản lý tài khoản</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thêm tài khoản</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                                Thêm tài khoản
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
                                            <span class="fw-light"> Tài khoản</span>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('admin.account.store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="small">Thêm một tài khoản mới bằng biểu mẫu này, hãy đảm bảo bạn điền đầy đủ thông tin</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="name">Tên</label>
                                                        <input id="addName" name="name" type="text" class="form-control" placeholder="Tên tài khoản" required value="{{old('name')}}" />
                                                        @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="email">Email</label>
                                                        <input id="addEmail" name="email" type="email" class="form-control" placeholder="Email" required value="{{old('email')}}" autocomplete="username"/>
                                                        @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input id="addphone" name="phone" type="text" class="form-control" placeholder="Số điện thoại" required value="{{old('phone')}}" autocomplete="phone"/>
                                                        @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label  for="roles">Lever</label>
                                                        <!-- <input id="addPosition" type="text" class="form-control" placeholder="Ngôn ngữ" /> -->
                                                        <select name="roles" id="lang" class="form-control" required>
                                                            <option value="{{old('roles')}}">Chọn lever</option>
                                                            <option value="0">Người dùng</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                        @error('lang')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="password">Mật khẩu</label>
                                                        <input id="password" name="password" type="password" class="form-control d-inline w-75" placeholder="Mật khẩu" required autocomplete="new-password"/>
                                                        <span class="float-end" style="cursor: pointer;" >
                                                            <i class="fa fa-eye" id="eye1" onclick=showpass(password,eye1)></i> <!-- FontAwesome eye icon -->
                                                        </span>
                                                        @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="password_confirmation">Nhập lại Mật khẩu</label>
                                                        <input id="passwordconfirm" name="password_confirmation" type="password" class="form-control d-inline w-75" placeholder="Nhập lại Mật khẩu" required autocomplete="new-password"/>
                                                        <span class="float-end" style="cursor: pointer;" >
                                                            <i class="fa fa-eye" id="eye2" onclick=showpass(passwordconfirm,eye2)></i> <!-- FontAwesome eye icon -->
                                                        </span>
                                                        @error('password-confirm')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
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

                        <div class="table-responsive">
                            <table
                                id="add-row"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th style="width: 12%">lever</th>
                                        <th style="width: 10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>lever</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ( $data as $user )
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <select name="roles" id="roles" class="form-control {{ $user->roles == 1 ? 'bg-secondary' : 'bg-success' }}" onchange="updateLever({{$user->id}})">
                                                <option value="{{$user->roles}}" selected>{{ $user->roles == 1 ? 'Admin' : 'Người dùng' }}</option>
                                                @if($user->id !== Auth::user()->id)
                                                <option value="{{$user->roles !== 1 ? '1' : '0' }}">{{$user->roles !== 1 ? 'Admin' : 'Người dùng' }}</option>
                                                @endif
                                            </select>
                                        </td>
                                        <script>
                                            function updateLever(userId) {


                                                // Gọi AJAX để gửi dữ liệu đến server
                                                $.ajax({
                                                    url: '{{route("admin.account.savelever")}}', // Đường dẫn đến route xử lý
                                                    type: 'POST',
                                                    data: {
                                                        "value": $("#roles").val(),
                                                        "userId": userId,
                                                        "_token": '{{ csrf_token() }}' // Token bảo mật CSRF
                                                    },
                                                    success: function(response) {
                                                        // Xử lý khi thành công
                                                        alert(response.message);
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Xử lý khi có lỗi xảy ra
                                                        console.error(error);
                                                    }
                                                });
                                            }
                                        </script>
                                        <td>
                                            @if($user->id !== Auth::user()->id)
                                            <div class="form-button-action">
                                                <button type="button" data-bs-toggle="modal" title="" data-index="{{$user->id}}" class="btn btn-link btn-primary btn-lg edituser" data-bs-target="#exampleModal1">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="{{route('admin.account.delete',['id'=>$user->id])}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Xác nhận xóa ?')">
                                                        <i class="fa fa-times mt-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            <span class="fw-mediumbold"> Thông tin</span>
                                            <span class="fw-light"> Tài khoản</span>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post" id="formeditacc">

                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="name">Tên</label>
                                                        <input id="editName" name="editname" type="text" class="form-control" placeholder="Tên tài khoản" required value="{{old('name')}}" />
                                                        @error('editname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="editemail">Email</label>
                                                        <input id="editEmail" name="email" type="email" class="form-control" placeholder="Email" required value="{{old('email')}}" autocomplete="username"/>
                                                        @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input id="editphone" name="editphone" type="text" class="form-control" placeholder="Số điện thoại" required value="{{old('phone')}}" autocomplete="phone"/>
                                                        @error('editphone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label  for="roles">Lever</label>
                                                        <!-- <input id="editPosition" type="text" class="form-control" placeholder="Ngôn ngữ" /> -->
                                                        <select name="editroles" class="form-control" required>
                                                            <option id="editroles" selected></option>
                                                            <option value="0">Người dùng</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                        @error('editroles')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
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
            </div>
        </div>
    </div>
</div>
<script>
    function showpass(idname, iconid) {

        const type = idname.getAttribute('type') == 'password' ? 'text' : 'password';
        idname.setAttribute('type', type);

        if (type === 'password') {
            iconid.classList.remove('fa-eye-slash');
            iconid.classList.add('fa-eye');
        } else {
            iconid.classList.remove('fa-eye');
            iconid.classList.add('fa-eye-slash');
        }
    }
</script>
<script>
    document.querySelectorAll('.edituser').forEach(deleteLink => {
        deleteLink.addEventListener('click', function(event) {

            const dataIndex = this.getAttribute('data-index');

            fetchData(dataIndex);
        });
    });
    // Hàm lấy dữ liệu từ API
    async function fetchData(dataIndex) {

        const apiUrl = 'http://127.0.0.1:8000/api/ql-account/' + dataIndex;
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
            // console.log(data['data'].roles);
            document.getElementById('formeditacc').action = 'account/'+data['data'].id+'/update';
            document.getElementById('editName').value = data['data'].name;
            document.getElementById('editEmail').value = data['data'].email;
            document.getElementById('editphone').value = data['data'].phone;
            document.getElementById('editroles').value = data['data'].roles;
            console.log(document.getElementById('editroles'));
            data['data'].roles == 1 ? document.getElementById('editroles').innerText = 'Admin' : document.getElementById('editroles').innerText = 'Người dùng';


            // Thêm logic để hiển thị dữ liệu lên giao diện nếu cần
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }
</script>

