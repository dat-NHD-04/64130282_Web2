package thiGK.ntu64130282.nguyenhuydat_ThiGK.controller;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import jakarta.servlet.http.HttpServletRequest;


@Controller
public class WebController {
	ArrayList<Student> sinhViens = new ArrayList<Student>(Arrays.asList(
			new Student("64130282", "Nguyễn Huy Đạt", 7.0),
			new Student("64136785", "Nguyễn Văn A", 6.0),
			new Student("64139221", "Trần Văn B", 4.5),
			new Student("64132235", "Lê Văn C", 6.9)
			));
	
	@GetMapping("/")
	public String toHome() {
		return "index";
	}
	
	
	@GetMapping("/page/view/id")
	public String toList(ModelMap model) {
		model.addAttribute("svs", sinhViens);
		return "List";
	}
	
	@GetMapping("/page/new")
	public String toNew(ModelMap model) {
		return "Addnew";
	}
	@GetMapping("/page/delete/id")
	public String toNew(ModelMap model) {
		return "Delete";
	}
	
	@RequestMapping(value = "/add", method = RequestMethod.POST)
	public String login(ModelMap model, HttpServletRequest request) {
		String mssv = request.getParameter("mssv");
		String hoTen = request.getParameter("hoTen");
		double diemTB = Double.parseDouble(request.getParameter("diemTB"));
		Student student = new Student(mssv, hoTen, diemTB);
		sinhViens.add(student);
		model.addAttribute("sv", sinhViens);
		return "list";
	}
}
