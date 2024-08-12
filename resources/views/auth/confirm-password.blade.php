@section('tieudetrang')
Xác nhận mật khẩu
@endsection
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Đây là khu vực an toàn của ứng dụng. Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mật khẩu')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-danger-button>
                {{ __('Xác nhận') }}
            </x-danger-button>
        </div>
    </form>
</x-guest-layout>
