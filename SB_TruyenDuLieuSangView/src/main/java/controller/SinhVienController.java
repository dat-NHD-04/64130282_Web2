package controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.ui.Model;
import model.SinhVien;

@Controller
public class SinhVienController {
	@GetMapping("/sinhvien")
	public String getSinhVien(Model model) {
        SinhVien sinhVien = new SinhVien("64130282", "Nguyễn Huy Đạt", 2004, "Nam");
        SinhVien sinhVien2 = new SinhVien("64130988", "Nguyễn Hà Vy", 2004, "Nữ");
        model.addAttribute("sinhVien", sinhVien);
        model.addAttribute("sinhVien2", sinhVien2);
        return "sinhvien";
    }
}