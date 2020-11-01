@extends("auth.login-button")
@section("meta")
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="custom-bdr-3d dashboard p-4" style="margin-top: 5rem">
        <h2>{{ auth()->user()['name'] }}</h2>
        <div class="pt-4">
          <h6 style="color: gray">點擊照片更換大頭貼</h6>
          <label class="label" data-toggle="tooltip" title="" data-original-title="">
            <img class="rounded mb-3" id="avatar" src="/storage/{{ $profile->avatar }}" alt="avatar">
            <input type="file" class="sr-only" id="input" name="image" accept="image/*">
          </label>
          <div class="alert custom-bdr"></div>
          <form class="pb-4" action="/dashboard" method="POST">
              @csrf
            <input type="text" name="name" value="{{ $profile->name }}">
            <button class="btn update-name mx-3">更新暱稱</button>
          </form>
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="img-container">
                    <img id="image" src="/storage/{{ $profile->avatar }}">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn" id="crop">Crop</button>
                </div>
              </div>
            </div>
          </div>
          <a class="btn mb-3" href="/member/donations">我的贊助</a>
          <a class="btn" href="/member/projects">我的專案</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
	window.addEventListener('DOMContentLoaded', function () {
		var avatar = document.getElementById('avatar');
		var image = document.getElementById('image');
		var input = document.getElementById('input');
		var $alert = $('.alert');
		var $modal = $('#modal');
		var cropper;
		$('[data-toggle="tooltip"]').tooltip();
		input.addEventListener('change', function (e) {
			var files = e.target.files;
			var done = function (url) {
				input.value = '';
				image.src = url;
				$alert.hide();
				$modal.modal('show');
			};
			var reader;
			var file;
			var url;
			if (files && files.length > 0) {
				file = files[0];
				if (URL) {
					done(URL.createObjectURL(file));
				} else if (FileReader) {
					reader = new FileReader();
					reader.onload = function (e) {
						done(reader.result);
					};
					reader.readAsDataURL(file);
				}
			}
		});
		$modal.on('shown.bs.modal', function () {
			cropper = new Cropper(image, {
				aspectRatio: 1,
				viewMode: 2,
				minContainerHeight: 200,
			});
		}).on('hidden.bs.modal', function () {
			cropper.destroy();
			cropper = null;
		});
		document.getElementById('crop').addEventListener('click', function () {
			var initialAvatarURL;
			var canvas;
			$modal.modal('hide');
			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					width: 300,
					height: 300,
				});
				initialAvatarURL = avatar.src;
				avatar.src = canvas.toDataURL();
				$alert.removeClass('alert-success alert-warning');
				canvas.toBlob(function (blob) {
					var formData = new FormData();
					formData.append('avatar', blob,'avatar.jpg');
					$.ajax('/dashboard', {
						method: 'POST',
						data: formData,
						processData: false,
						contentType: false,
						headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function () {
							$alert.show().text('上傳成功');
						},
						error: function () {
							avatar.src = initialAvatarURL;
							$alert.show().text('上傳失敗');
						},
					});
				});
			}
		});
	});
</script>
@endsection
