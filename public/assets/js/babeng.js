			/* Fungsi formatRupiah */
			function babengRupiah(angka, prefix){
				var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split   		= number_string.split(','),
				sisa     		= split[0].length % 3,
				rupiah     		= split[0].substr(0, sisa),
				ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

				// tambahkan titik jika yang di input sudah menjadi angka ribuan
				if(ribuan){
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}

				rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
				return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
			}

// //ternary if example
// function getAge(birthYear) {
//   return birthYear > 2000 ? "You are not born yet" : "You are " + (2020 - birthYear);
// }

// //convert number to currency
// function convertToCurrency(number) {
//   return "$" + number.toFixed(2);
// }

// //create array and push 3 objects with 3 properties
// function createArray() {
//   var arr = [];
//   arr.push({
//     name: "John",
//     age: 30,
//     city: "New York"
//   });
//   arr.push({
//     name: "Mary",
//     age: 25,
//     city: "Paris"
//   });
//   arr.push({
//     name: "Bob",
//     age: 20,
//     city: "London"
//   });
//   return arr;
// }

// //if else example
// function getAge(birthYear) {
//   return birthYear > 2000 ? "You are not born yet" : "You are " + (2020 - birthYear);
// }
