$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// tombol simpan
	$("#simpanSekolah").click(() => {
		$.ajax({
			url: base_url + "pengaturan/simpanSekolah",
			type: "POST",
			data: $("#form-sekolah").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	$("#formProfile").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			url: base_url + "pengaturan/simpanProfile",
			type: "POST",
			data: $("#formProfile").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	$("#formPwd").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			url: base_url + "pengaturan/editPassword",
			type: "POST",
			data: $("#formPwd").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});
});
