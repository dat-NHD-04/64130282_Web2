package controller;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

import respositorie.IPhone;

@Controller
public class PhoneController {
	@Autowired
	IPhone dt;
	
	@GetMapping("/phone/all")
	public String getAll() {
		dt.count();
		return null;
	}
}
