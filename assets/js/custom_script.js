// sweet alert
const flashData = $('.flash-data').data('flashdata');

if (flashData == 'login') {
	swal({
		title: "Success",
		text: "Login Berhasil",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'login-gagal') {
	swal({
		title: "Login Gagal",
		text: "Username dan Password tidak terdaftar!",
		icon: "error",
		button: "OK",
	});
} else if (flashData == 'kembali') {
	swal({
		title: "Success",
		text: "Buku Sudah Kembali",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'gagal-kembali') {
	swal({
		title: "Error",
		text: "Terjadi kesalahan pengembalian",
		icon: "error",
		button: "OK",
	});
}
