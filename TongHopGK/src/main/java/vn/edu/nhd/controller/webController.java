package vn.edu.nhd.controller;

import org.springframework.web.bind.annotation.GetMapping;

public class webController {
	@GetMapping("/")
	public String trangChu() {
		return "FrontEndView/home";
	}
	
	@GetMapping("/about")
	public String gioiThieu() {
		return "FrontEndView/about";
	}
	@GetMapping("/studentList")
	public String danhSach() {
		return "FrontEndView/list";
	}
	@GetMapping("/addNew")
	public String themMoi() {
		return "FrontEndView/addNew";
	}
}
