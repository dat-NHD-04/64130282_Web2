package nguyenhuydat_ThiGK_Lan2.thiGK.ntu64130282.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {
	@GetMapping("/")
	public String Home() {
		return "index";
	}
}
