@php
use Illuminate\Support\Facades\DB;
$loaitin_ar = DB::table('theloaitin')
->select('id', 'ten','thuTu','moTa')
->limit(7)
->orderBy('thuTu', 'asc')
->get();
@endphp

<!-- Main-menu -->
<div class="main-menu d-none d-md-block">
    <nav>
        <ul id="navigation">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
            @foreach ($loaitin_ar as $loaitin)
            <li><a href="{{route('blogs',['ten' => $loaitin->moTa])}}">{{$loaitin->ten}}</a></li>
            @endforeach
        </ul>
    </nav>
</div>
