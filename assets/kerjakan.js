$(document).ready(function () {
	// console.log("Costom");

	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// tangkap data yang di klik user
	$(document).delegate(".pilihan", "click", function () {
		const jawaban = $(this).data("jawaban");
		const id_detail_tugas = $(this).data("id");
		const data = {
			jawaban,
			id_detail_tugas,
		};
		jawabPg(data);
	});

	$(document).delegate(".jawabesay", "click", function (e) {
		console.log($(this).data("id"));
		// console.log(e.target.parentElement);
		const jawaban = $(e.target.parentElement).serialize();
		// console.log(jawaban);
		jawabEsay($(this).data("id"), jawaban);
	});

	function jawabEsay(id, jawaban) {
		$.ajax({
			url: base_url + "tugas/jawabesay/" + id,
			type: "POST",
			data: jawaban,
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	function jawabPg(data) {
		// console.log(data);
		$.ajax({
			url: base_url + "tugas/jawabPg/" + tugasid,
			type: "POST",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	loadData();

	// crud
	// tombol simpan
	$("#simpanEsay").click(() => {
		$.ajax({
			url: base_url + "tugas/simpanEsay/" + tugasid,
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

	// isi dari tugas
	function loadData() {
		const tugasid = $("#idtugas").html();
		$.ajax({
			url: base_url + `tugas/getEsayKerjakan/${tugasid}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#kerjakanesay").html(response.html);
				} else {
					Toast.fire({
						icon: "error",
						title: response.pesan,
					});
				}
			},
		});
		$.ajax({
			url: base_url + `tugas/getPgKerjakan/${tugasid}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#kerjakanpg").html(response.html);
				} else {
					Toast.fire({
						icon: "error",
						title: response.pesan,
					});
				}
			},
		});
	}
});
