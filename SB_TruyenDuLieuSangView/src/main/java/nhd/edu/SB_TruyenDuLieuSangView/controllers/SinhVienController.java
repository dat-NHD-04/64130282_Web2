package nhd.edu.SB_TruyenDuLieuSangView.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.ui.Model;
import nhd.edu.SB_TruyenDuLieuSangView.models.*;

@Controller
public class SinhVienController {
	@GetMapping("/sinhvien")
	public String getSinhVien(Model model) {
        SinhVien sinhVien = new SinhVien("64130282", "Nguyễn Huy Đạt", 2004, "Nam");
        model.addAttribute("sinhVien", sinhVien);
        return "sinhvien";
    }
}
