let page = 1;
let id = 0;
let keyword = "";
$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// keyword di ketik
	$(document).on("keyup", "#keyword", function () {
		page = 1;
		keyword = $("#keyword").val();
		loadDataGuru();
	});

	// view
	$("#guru").on("click", ".page2", function () {
		page = $(this).data("page");
		loadDataGuru();
	});
	$("#guru").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusData();
	});
	$("#guru").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	loadDataGuru();

	// tombol simpan
	$("#simpanGuru").click(() => {
		$.ajax({
			url: base_url + "guru/simpan",
			type: "POST",
			data: $("#modal-input form").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataGuru();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol edit
	$("#editGuru").click(() => {
		$.ajax({
			url: base_url + "guru/edit/" + id,
			type: "POST",
			data: $("#modal-input form").serialize(), //ambil semua data dari form
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataGuru();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// get data
	function loadDataGuru() {
		$.ajax({
			url: base_url + `guru/getData?page=${page}&q=${keyword}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#guru").html(response.html);
					// Toast.fire({
					// 	icon: "success",
					// 	title: response.pesan,
					// });
				} else {
					Toast.fire({
						icon: "error",
						title: response.pesan,
					});
				}
			},
		});
	}

	// tombol hapus
	function hapusData() {
		$.ajax({
			url: base_url + "guru/delete/" + id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataGuru();
					$("#modal-input").modal("hide");
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambah").on("click", function () {
		$(".modal-title").html("Tambah");
		$("#simpanGuru").show();
		$("#editGuru").hide();
		$("#nip").val("");
		$("#nama").val("");
		$("#email").val("example@email.com");
		$("#alamat").val("");
		$("#kelamin").val("");
		$("#tanggalLahir").val("");
		$("#tempatLahir").val("");
		$("#phone").val("");
	});
	$("#guru").on("click", "#edit", function () {
		$(".modal-title").html("Edit");
		$("#simpanGuru").hide();
		$("#editGuru").show();

		$.ajax({
			url: "guru/tampiledit/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nip").val(data.nip);
				$("#nama").val(data.nama_guru);
				$("#email").val(data.email);
				$("#id").val(data.id);
			},
		});
	});
});
