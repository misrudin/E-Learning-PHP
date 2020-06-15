let page = 1;
let id = 0;
$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
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
	$("#formMateri").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + `materi/simpan`,
			type: "POST",
			cache: false,
			contentType: false,
			processData: false,
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
	$("#editMateri").click(function () {
		// console.log("form data2");

		const file = $("#pdf").prop("files")[0];
		const id_kelas = $("#kelas").val();
		const id_mapel = $("#mapel").val();
		const id = $("#id").val();
		const desc = $("#description").val();
		let fd = new FormData();

		// fd.set("id_kelas", id_kelas);
		// fd.set("id_mapel", id_mapel);
		// fd.set("type", type);
		// fd.set("description", desc);
		fd.append("pdf", file);
		// console.log(file, id_kelas, id_mapel, type, desc);

		// console.log(fd);
		if ((id_kelas, id_mapel, type, desc, file)) {
			$.ajax({
				url:
					base_url +
					`materi/edit?id_kelas=${id_kelas}&id_mapel=${id_mapel}&id=${id}&desc=${desc}`,
				type: "POST",
				cache: false,
				contentType: false,
				processData: false,
				data: fd,
				dataType: "json",
				success: function (data) {
					console.log(data);
				},
			});
		} else {
			toastr.error("Input tidak boleh kosong!");
		}
	});

	// get data
	function loadData() {
		$.ajax({
			url: base_url + "materi/getData?page=" + page,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#view").html(response.html);
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
			url: base_url + "materi/delete/" + id,
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
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambahMateri").on("click", function () {
		$(".modal-title").html("Tambah Materi");
		// $(".modal-body form").attr("action", "materi");
		$("#simpanMateri").show();
		$("#editMateri").hide();
		$("#type").val("materi");
		$("#kelas").val("");
		$("#mapel").val("");
		$("#pdf").val("");
		$("#description").val("");
	});
	$(".tambahSoal").on("click", function () {
		$(".modal-title").html("Tambah Soal");
		// $(".modal-body form").attr("action", "materi");
		$("#simpanMateri").show();
		$("#editMateri").hide();
		$("#type").val("soal");
		$("#kelas").val("");
		$("#mapel").val("");
		$("#pdf").val("");
		$("#description").val("");
	});

	$("#view").on("click", "#edit", function () {
		$(".modal-title").html("Edit Mapel");
		$(".modal-body form").attr("action", "materi/edit");
		$("#simpanMateri").hide();
		$("#editMateri").show();

		$.ajax({
			url: base_url + "materi/tampilEdit/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#kelas").val(data.id_kelas);
				$("#mapel").val(data.id_mapel);
				$("#description").val(data.description);
			},
		});
	});
});
