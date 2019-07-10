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
} else if (flashData == 'stock-kosong') {
	swal({
		title: "Error",
		text: "Stock tidak mencukupi untuk dipinjam!",
		icon: "error",
		button: "OK",
	});
} else if (flashData == 'ambil-berhasil') {
	swal({
		title: "Success",
		text: "Baju Telah Diambil",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'tukar-berhasil') {
	swal({
		title: "Success",
		text: "Baju Telah Ditukar",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'hapus') {
	swal({
		title: "Success",
		text: "Data Berhasil di Hapus.",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'kembali-berhasil') {
	swal({
		title: "Success",
		text: "Baju Telah Kembali dan Ditukar dengan yang sesuai.",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'kembali-lebih') {
	swal({
		title: "Error",
		text: "Qty melebihi batas yang perlu dikembalikan!",
		icon: "error",
		button: "OK",
	});
}
