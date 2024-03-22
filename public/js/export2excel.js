
let myHeader = [];
let myFooter = [];

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
	widths = [{ width: 5 },{ width: 10 },{ width: 25 },{ width: 10 },{ width: 25 },{ width: 10 },{ width: 15 },{ width: 15 },{ width: 15 },
				{ width: 15 },{ width: 20 }];
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
	widths = [{ width: 5 },{ width: 10 },{ width: 25 },{ width: 10 },{ width: 25 },{ width: 10 },{ width: 15 },{ width: 15 },{ width: 15 },
		{ width: 15 },{ width: 20 }];
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
	//set_section_row(row,header_title);
	row.height = 35;


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
	row_header(ws,'A5:A5','A5','STT',header);

	const rowValues = [];
	let i = 0;
	/*if (myData && Array.isArray(myData)) {
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
	}*/

	//
	const buf = await wb.xlsx.writeBuffer();
	saveAs(new Blob([buf]), `SoTaiSan_${nam_theo_doi}.xlsx`);
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
