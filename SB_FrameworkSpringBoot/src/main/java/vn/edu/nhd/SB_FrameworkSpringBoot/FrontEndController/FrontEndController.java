package vn.edu.nhd.SB_FrameworkSpringBoot.FrontEndController;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class FrontEndController {
	@GetMapping("/")
	public String trangChu() {
		return "frontEndViews/index";
	}
	
	@GetMapping("/about")
	public String gioiThieu() {
		return "frontEndViews/about";
	}
}
