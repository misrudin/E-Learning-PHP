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

	$(document).on("keyup", "#keyword", function () {
		page = 1;
		keyword = $("#keyword").val();
		loadData();
	});

	// view
	$("#view").on("click", ".page", function () {
		page = $(this).data("page");
		loadData();
	});
	$("#view").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusData();
	});
	$("#view").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	loadData();

	// tombol simpan
	$("#simpanMapel").click(() => {
		$.ajax({
			url: base_url + "mapel/simpan",
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
					loadData();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol edit
	$("#editMapel").click(() => {
		$.ajax({
			url: base_url + "mapel/edit/" + id,
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
					loadData();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// get data
	function loadData() {
		$.ajax({
			url: base_url + `mapel/getData?page=${page}&q=${keyword}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#view").html(response.html);
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
			url: base_url + "mapel/delete/" + id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					$("#modal-input").modal("hide");
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambahMapel").click(function () {
		$(".modal-title").html("Tambah Mapel");
		$("#simpanMapel").show();
		$("#editMapel").hide();
		$("#mapel").val("");
	});
	$("#view").on("click", "#edit", function () {
		$(".modal-title").html("Edit Mapel");
		$("#simpanMapel").hide();
		$("#editMapel").show();

		$.ajax({
			url: base_url + "mapel/tampiledit/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#mapel").val(data.nama_mapel);
				$("#id").val(data.id);
			},
		});
	});
});
