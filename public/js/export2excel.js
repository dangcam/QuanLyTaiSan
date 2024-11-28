
let myHeader = [];
let myFooter = [];

async function export_excel_kiem_ke(nam_theo_doi,bo_phan_su_dung,loai_kiem_ke,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'center', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 7 },{ width: 40 },{ width: 10 },{ width: 10 },{ width: 40 },{ width: 40 }];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 4);
	row.getCell(1).value ="SỞ TÀI NGUYÊN VÀ MÔI TRƯỜNG \n VĂN PHÒNG ĐĂNG KÝ ĐẤT ĐAI";
	mergeCells(ws, row, 5, 6);
	row.getCell(5).value = "CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM\nĐộc lập - Tự do - Hạnh phúc";
	set_section_row(row,title);
	row = ws.addRow();
	mergeCells(ws, row, 1, 6);
	row.getCell(1).value = "BIÊN BẢN KIỂM KÊ TRANG THIẾT BỊ LÀM VIỆC \n"+bo_phan_su_dung;
	set_section_row(row,title);
	row.font = {name: 'Times New Roman', size: 13, bold: true};
	row.alignment = {horizontal: 'center',vertical:'bottom',wrapText: true}
	row = ws.addRow();
	mergeCells(ws, row, 1, 6);
	row.getCell(1).value = "Thời điểm kê: Ngày 31 tháng 12 năm "+nam_theo_doi;
	row.font = {name: 'Times New Roman', size: 12, italic: true, bold: true};
	row.alignment = { horizontal: 'center', vertical: 'middle' , wrapText: true};
	// header
	row_header(ws,'A4:A4','A4','STT',header);
	row_header(ws,'B4:B4','B4','Tên tài sản, CCDC',header);
	row_header(ws,'C4:C4','C4','Số lượng',header);
	row_header(ws,'D4:D4','D4','ĐVT',header);
	row_header(ws,'E4:E4','E4','Người sử dụng',header);
	row_header(ws,'F4:F4','F4','Ghi chú',header);
	//
	const rowValues = [];
	let i = 0;
	if (myData && Array.isArray(myData)) {
		myData.forEach((rowData) => {
			rowValues[2] = rowData['ten_tai_san'];
			rowValues[3] = rowData['so_luong'];
			rowValues[4] = rowData['don_vi'];
			rowValues[5] = rowData['nguoi_su_dung'];
			rowValues[6] = rowData['ghi_chu'];
			i++;
			rowValues[1] = i;
			addRow(ws,rowValues,data);
		});
	} else {
		console.error('myData is not defined or not an array.');
	}

	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${nam_theo_doi}_${bo_phan_su_dung}_${loai_kiem_ke}.xlsx`);
}
async function export_excel(nam_theo_doi,bo_phan_su_dung,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'center', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 5 },{ width: 10 },{ width: 10 },{ width: 30 },{ width: 10 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 20 },
				{ width: 5 },{ width: 20 },{ width: 5 },{ width: 20 },{ width: 20 },{ width: 20 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 }];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 5);
	row.getCell(1).value ="VĂN PHÒNG ĐĂNG KÝ ĐẤT \n"+ bo_phan_su_dung;
	mergeCells(ws, row, 6, 11);
	row.getCell(8).value = "CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM\nĐộc lập - Tự do - Hạnh phúc";
	set_section_row(row,title);
	row = ws.addRow();
	mergeCells(ws, row, 1, 11);
	row.getCell(1).value = "BIỂU TỔNG HỢP TÀI SẢN";
	set_section_row(row,title);
	row.font = {name: 'Times New Roman', size: 11, bold: true};
	row.alignment = {horizontal: 'center',vertical:'bottom'}
	row = ws.addRow();
	mergeCells(ws, row, 1, 11);
	row.getCell(1).value = nam_theo_doi;
	row.font = {name: 'Times New Roman', size: 12, italic: true, bold: true};
	row.alignment = { horizontal: 'center', vertical: 'middle' , wrapText: true};
	// header
	row_header(ws,'A4:A4','A4','STT',header);
	row_header(ws,'B4:B4','B4','Mã tài sản',header);
	row_header(ws,'C4:C4','C4','Tên tài sản',header);

	row_header(ws,'D4:D4','D4','Loại tài sản',header);
	row_header(ws,'E4:E4','E4','Bộ phận sử dụng',header);
	row_header(ws,'F4:F4','F4','Số lượng',header);
	row_header(ws,'G4:G4','G4','Nguyên giá',header);
	row_header(ws,'H4:H4','H4','HM Lũy kế',header);

	row_header(ws,'I4:I4','I4','Giá trị còn lại',header);
	row_header(ws,'J4:J4','J4','Ngày ghi tăng',header);
	row_header(ws,'K4:K4','K4','Trạng thái tài sản',header);
	//
	const rowValues = [];
	let i = 0;
	if (myData && Array.isArray(myData)) {
		myData.forEach((rowData) => {
			rowValues[2] = rowData['ma_tai_san'];
			rowValues[3] = rowData['ten_tai_san'];
			rowValues[4] = rowData['loai_tai_san'];
			rowValues[5] = rowData['bo_phan_su_dung'];
			rowValues[6] = rowData['so_luong'];
			rowValues[7] = rowData['gia_tri'];
			rowValues[8] = rowData['hm_luy_ke'];
			rowValues[9] = rowData['gia_tri_con_lai'];
			rowValues[10] = rowData['ngay_ghi_tang'];
			rowValues[11] = rowData['trang_thai'];
			i++;
			rowValues[1] = i;
			addRow(ws,rowValues,data);
		});
	} else {
		console.error('myData is not defined or not an array.');
	}

	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${bo_phan_su_dung}_${nam_theo_doi}.xlsx`);
}
async function export_excel_so_ts(nam_theo_doi,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 13, bold: true},
		alignment: { horizontal: 'center', vertical: 'middle' , wrapText: true},
	};
	const header_title = {
		border: false,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'left', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 5 },{ width: 10 },{ width: 10 },{ width: 25 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 15 },
		{ width: 5 },{ width: 10 },{ width: 5 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 10 },{ width: 10 }];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 10);
	row.getCell(1).value ="Đơn vị: Văn phòng Đăng ký Đất đai tỉnh Bình Phước";
	set_section_row(row.getCell(1),header_title);
	mergeCells(ws, row, 11, 19);
	row.getCell(11).value = "Mẫu số: S24-H";
	row.getCell(11).font = {name: 'Times New Roman', size: 12, bold: true};
	row.getCell(11).alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
	//set_section_row(row,header_title);
	row = ws.addRow();
	mergeCells(ws, row, 1, 10);
	row.getCell(1).value ="Mã QHNS: 1090828";
	set_section_row(row.getCell(1),header_title);
	mergeCells(ws, row, 11, 19);
	row.getCell(11).value = "(Ban hành kèm theo Thông tư số 107/2017/TT-BTC\nngày 10/10/2017 của Bộ Tài chính)";
	row.getCell(11).font = {name: 'Times New Roman', size: 12, italic: true, bold: false};
	row.getCell(11).alignment = { horizontal: 'center', vertical: 'middle', wrapText: true };
	row.height = 35;
	row = ws.addRow();
	mergeCells(ws, row, 1, 19);
	row.getCell(1).value = "BIỂU TỔNG HỢP TÀI SẢN";
	set_section_row(row,title);
	row.font = {name: 'Times New Roman', size: 11, bold: true};
	row.alignment = {horizontal: 'center',vertical:'bottom'}
	row = ws.addRow();
	mergeCells(ws, row, 1, 19);
	row.getCell(1).value = nam_theo_doi;
	row.font = {name: 'Times New Roman', size: 12, italic: true, bold: true};
	row.alignment = { horizontal: 'center', vertical: 'middle' , wrapText: true};
	// header
	row_header(ws,'A5:A7','A5','STT',header);
	row_header(ws,'B5:C5','B5','Chứng từ',header);
	row_header(ws,'B6:B7','B6','Số hiệu',header);
	row_header(ws,'C6:C7','C7','Ngày, tháng',header);
	row_header(ws,'D5:I5','D5','Ghi tăng tài sản cố định',header);
	row_header(ws,'D6:D7','D6','Tên, đặc điểm, ký hiệu TSCĐ',header);
	row_header(ws,'E6:E7','E6','Nước sản xuất',header);
	row_header(ws,'F6:F7','F6','Tháng, năm đưa vào sử dụng ở đơn vị',header);
	row_header(ws,'G6:G7','G6','Số hiệu TSCĐ',header);
	row_header(ws,'H6:H7','H6','Thẻ TSCĐ',header);
	row_header(ws,'I6:I7','I6','Nguyên giá TSCĐ',header);
	row_header(ws,'J5:O5','J5','Khấu hao (hao mòn) tài sản cố định',header);
	row_header(ws,'J6:K6','K6','Khấu hao',header);
	row_header(ws,'L6:M6','L6','Hao mòn',header);
	row_header(ws,'J7:J7','J7','Tỷ lệ %',header);
	row_header(ws,'K7:K7','K7','Số tiền',header);
	row_header(ws,'L7:L7','L7','Tỷ lệ %',header);
	row_header(ws,'M7:M7','M7','Số tiền',header);
	row_header(ws,'N6:N7','N6','Tổng số khấu hao (hao mòn) phát sinh trong năm',header);
	row_header(ws,'O6:O7','O6','Lũy kế khấu hao/hao mòn đã tính đến khi chuyển sổ hoặc ghi giảm TSCĐ',header);
	row_header(ws,'P5:S5','P5','Ghi giảm TSCĐ',header);
	row_header(ws,'P6:Q6','P6','Chứng từ',header);
	row_header(ws,'P7:P7','P7','Số hiệu',header);
	row_header(ws,'Q7:Q7','Q7','Ngày, tháng',header);
	row_header(ws,'R6:R7','R6','Lý do ghi giảm TSCĐ',header);
	row_header(ws,'S6:S7','S6','Giá trị còn lại của TSCĐ',header);

	const rowValues = [];
	if (myData && Array.isArray(myData)) {
		myData.forEach((rowData) => {
			if(rowData['stt'] == 0){
				row = ws.addRow();
				set_section_row(row.getCell(1),header);
				set_section_row(row.getCell(2),header);
				set_section_row(row.getCell(3),header);
				set_section_row(row.getCell(4),header);
				set_section_row(row.getCell(5),header);
				set_section_row(row.getCell(6),header);
				set_section_row(row.getCell(7),header);
				set_section_row(row.getCell(8),header);
				set_section_row(row.getCell(9),header);
				set_section_row(row.getCell(10),header);
				set_section_row(row.getCell(11),header);
				set_section_row(row.getCell(12),header);
				set_section_row(row.getCell(13),header);
				set_section_row(row.getCell(14),header);
				set_section_row(row.getCell(15),header);
				set_section_row(row.getCell(16),header);
				set_section_row(row.getCell(17),header);
				set_section_row(row.getCell(18),header);
				set_section_row(row.getCell(19),header);
				mergeCells(ws, row, 1, 8);
				row.getCell(1).value = 'Loại tài sản: '+rowData['ten_tai_san'];
				row.getCell(1).alignment = { horizontal: 'left', vertical: 'middle', wrapText: true };
				row.getCell(9).value = rowData['gia_tri'];
				row.getCell(13).value = rowData['hm_kh_nam'];
				row.getCell(14).value = rowData['hm_kh_nam'];
				row.getCell(15).value = rowData['hm_luy_ke'];
				row.getCell(19).value = rowData['tong_nguyen_gia'];
			}else{
			rowValues[1] = rowData['stt'];
			rowValues[2] = rowData['ma_chung_tu'];
			rowValues[3] = rowData['ngay_chung_tu'];
			rowValues[4] = rowData['ten_tai_san'];
			rowValues[5] = rowData['nuoc_san_xuat'];
			rowValues[6] = rowData['ngay_bd_su_dung'];
			rowValues[7] = rowData['ma_tai_san'];
			rowValues[8] = rowData['ma_tai_san'];
			rowValues[9] = rowData['gia_tri'];
			rowValues[10] = '';
			rowValues[11] = '';
			rowValues[12] = rowData['tyle_haomon'];
			rowValues[13] = rowData['hm_kh_nam'];
			rowValues[14] = rowData['hm_kh_nam'];
			rowValues[15] = rowData['hm_luy_ke'];
			rowValues[16] = rowData['ma_ct_giam'];
			rowValues[17] = rowData['ngay_ct_giam'];
			rowValues[18] = rowData['ly_do_giam'];
			rowValues[19] = rowData['tong_nguyen_gia'];

			addRow(ws,rowValues,data);
			}
		});
	} else {
		console.error('myData is not defined or not an array.');
	}

	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `SoTaiSan_${nam_theo_doi}.xlsx`);
}
async function export_excel_kk_ts(nam_theo_doi,myData){
	const title = {
		border: false,
		height: 35,
		font: { name: 'Times New Roman',size: 13, bold: true},
		alignment: { horizontal: 'center', vertical: 'middle' , wrapText: true},
	};
	const header_title = {
		border: false,
		font: { name: 'Times New Roman',size: 12, bold: true},
		alignment: { horizontal: 'left', vertical: 'middle' , wrapText: true},
	};
	const header = {
		border: true,
		font: {  name: 'Times New Roman', size: 12, bold: true },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
	};
	const data = {
		border: true,
		font: { name: 'Times New Roman',size: 12, bold: false },
		alignment: { horizontal: 'center', vertical: 'middle', wrapText: true },
		fill: null,
	};
	let wb = new ExcelJS.Workbook();
	let ws = wb.addWorksheet('Export');
	widths = [{ width: 5 },{ width: 15 },{ width: 30 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 },{ width: 15 }];
	ws.columns = widths;
	// Tiêu đề
	let row = ws.addRow();
	mergeCells(ws, row, 1, 9);
	row.getCell(1).value = "DANH SÁCH KIỂM KÊ TÀI SẢN CỐ ĐỊNH";
	set_section_row(row,title);
	row.font = {name: 'Times New Roman', size: 13, bold: true};
	row.alignment = {horizontal: 'center',vertical:'bottom'}
	row = ws.addRow();
	mergeCells(ws, row, 1, 9);
	row.getCell(1).value = nam_theo_doi;
	row.font = {name: 'Times New Roman', size: 12, italic: true, bold: true};
	row.alignment = { horizontal: 'center', vertical: 'middle' , wrapText: true};
	// header
	row_header(ws,'A3:A3','A3','STT',header);
	row_header(ws,'B3:B3','B3','Mã tài sản',header);
	row_header(ws,'C3:C3','C3','Tên tài sản',header);
	row_header(ws,'D3:D3','D3','Số seri',header);
	row_header(ws,'E3:E3','E3','Đơn vị tính',header);
	row_header(ws,'F3:F3','F3','Số lượng theo sổ kế toán',header);
	row_header(ws,'G3:G3','G3','Số lượng theo thực tế (*)',header);
	row_header(ws,'H3:H3','H3','Tình trạng của tài sản',header);
	row_header(ws,'I3:I3','I3','Ghi chú',header);

	const rowValues = [];
	if (myData && Array.isArray(myData)) {
		myData.forEach((rowData) => {
			if(rowData['stt'] == 0){
				row = ws.addRow();
				set_section_row(row.getCell(1),header);
				set_section_row(row.getCell(2),header);
				set_section_row(row.getCell(3),header);
				set_section_row(row.getCell(4),header);
				set_section_row(row.getCell(5),header);
				set_section_row(row.getCell(6),header);
				set_section_row(row.getCell(7),header);
				set_section_row(row.getCell(8),header);
				set_section_row(row.getCell(9),header);
				mergeCells(ws, row, 1, 9);
				row.getCell(1).value = 'Bộ phận: '+rowData['ten_bp'] +' ('+rowData['tong']+')';
				row.getCell(1).alignment = { horizontal: 'left', vertical: 'middle', wrapText: true };
			}else{
				rowValues[1] = rowData['stt'];
				rowValues[2] = rowData['ma_tai_san'];
				rowValues[4] = rowData['ten_tai_san'];
				rowValues[4] = rowData['so_seri'];
				rowValues[5] = rowData['don_vi_tinh'];
				rowValues[6] = rowData['so_luong'];
				rowValues[7] = rowData['so_luong'];
				rowValues[8] = '';
				rowValues[9] = '';
				addRow(ws,rowValues,data);
			}
		});
	} else {
		console.error('myData is not defined or not an array.');
	}

	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `KiemKeTaiSan_${nam_theo_doi}.xlsx`);
}
function row_header(ws,merCell,mcell,value,section){
	ws.mergeCells(merCell);
	ws.getCell(mcell).value = value;
	let cell = ws.getCell(mcell);
	cell.width = 100;
	set_section_row(cell,section);
}
async function exportToExcel(fileName, sheetName, report,myData) {
	if (!myData || myData === 0) {
		console.error('Chưa có data');
		return;
	}
	console.log('exportToExcel', myData);

	if (report !== '') {
		myHeader = ['Tên', 'Họ', 'Email', 'Phone', 'Income'];
		exportToExcelPro('Users', 'Users', report, myHeader, myFooter, [
			{ width: 15 },
			{ width: 15 },
			{ width: 30 },
			{ width: 20 },
			{ width: 20 },
		],myData);
		return;
	}

	const wb = new ExcelJS.Workbook();
	const ws = wb.addWorksheet(sheetName);
	const header = Object.keys(myData[0]);
	console.log('header', header);
	ws.addRow(header);
	myData.forEach((rowData) => {
		console.log('rowData', rowData);
		row = ws.addRow(Object.values(rowData));
	});

	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${fileName}.xlsx`);
}

async function exportToExcelPro(
	fileName,
	sheetName,
	report,
	myHeader,
	myFooter,
	widths,
	myData
) {
	if (!myData || myData.length === 0) {
		console.error('Chưa có data');
		return;
	}
	console.log('exportToExcel', myData);

	const wb = new ExcelJS.Workbook();
	const ws = wb.addWorksheet(sheetName);
	const columns = myHeader?.length;
	const title = {
		border: true,
		money: false,
		height: 100,
		font: { size: 30, bold: false, color: { argb: 'FFFFFF' } },
		alignment: { horizontal: 'center', vertical: 'middle' },
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: '0000FF',
			},
		},
	};
	const header = {
		border: true,
		money: false,
		height: 70,
		font: { size: 15, bold: false, color: { argb: 'FFFFFF' } },
		alignment: { horizontal: 'center', vertical: 'middle' },
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: 'FF0000',
			},
		},
	};
	const data = {
		border: true,
		money: true,
		height: 0,
		font: { size: 12, bold: false, color: { argb: '000000' } },
		alignment: null,
		fill: null,
	};
	const footer = {
		border: true,
		money: true,
		height: 70,
		font: { size: 15, bold: true, color: { argb: 'FFFFFF' } },
		alignment: null,
		fill: {
			type: 'pattern',
			pattern: 'solid', //darkVertical
			fgColor: {
				argb: '0000FF',
			},
		},
	};
	if (widths && widths.length > 0) {
		ws.columns = widths;
	}

	let row = addRow(ws, [report], title);
	mergeCells(ws, row, 1, columns);

	addRow(ws, myHeader, header);
	// console.log('wb', wb);
	myData.forEach((row) => {
		addRow(ws, Object.values(row), data);
	});
	// console.log('myFooter', myFooter);

	row = addRow(ws, myFooter, footer);
	mergeCells(ws, row, 1, columns - 1);

	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `${fileName}.xlsx`);
}

function addRow(ws, data, section) {
	const borderStyles = {
		top: { style: 'thin' },
		left: { style: 'thin' },
		bottom: { style: 'thin' },
		right: { style: 'thin' },
	};
	const row = ws.addRow(data);
	console.log('addRow', section, data);
	row.eachCell({ includeEmpty: true }, (cell, colNumber) => {
		if (section?.border) {
			cell.border = borderStyles;
		}
		if (typeof cell.value === 'number') {
			cell.alignment = { horizontal: 'right', vertical: 'middle' };
		}
		if (section?.alignment) {
			cell.alignment = section.alignment;
		} else {
			cell.alignment = { vertical: 'middle' };
		}
		if (section?.font) {
			cell.font = section.font;
		}
		if (section?.fill) {
			cell.fill = section.fill;
		}
	});
	if (section?.height > 0) {
		row.height = section.height;
	}
	return row;
}
function set_section_row(row, section) {
	const borderStyles = {
		top: { style: 'thin' },
		left: { style: 'thin' },
		bottom: { style: 'thin' },
		right: { style: 'thin' },
	};
	if (section?.border) {
		row.border = borderStyles;
	}
	if (section?.alignment) {
		row.alignment = section.alignment;
	} else {
		row.alignment = { vertical: 'middle' };
	}
	if (section?.font) {
		row.font = section.font;
	}
	if (section?.fill) {
		row.fill = section.fill;
	}
	if (section?.height > 0) {
		row.height = section.height;
	}
	return row;
}

function mergeCells(ws, row, from, to) {
	ws.mergeCells(`${row.getCell(from)._address}:${row.getCell(to)._address}`);
}

function columnToLetter(column) {
	var temp,
		letter = '';
	while (column > 0) {
		temp = (column - 1) % 26;
		letter = String.fromCharCode(temp + 65) + letter;
		column = (column - temp - 1) / 26;
	}
	return letter;
}
