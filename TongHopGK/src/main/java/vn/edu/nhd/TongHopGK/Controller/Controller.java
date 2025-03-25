package vn.edu.nhd.TongHopGK.Controller;

import org.springframework.web.bind.annotation.GetMapping;

public class Controller {
	@GetMapping("/")
	public String trangChu() {
		return "frontEndViews/home";
	}
	
	@GetMapping("/about")
	public String gioiThieu() {
		return "frontEndViews/about";
	}
}
