package vn.edu.nhd.SB_TransferSpringBoot.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class TestController {

    @GetMapping("/view1")
    public String showView1() {
        return "view1";
    }

    @PostMapping("/submit")
    public String submitForm(@RequestParam("firstName") String firstName,
                             @RequestParam("lastName") String lastName,
                             Model model) {
        model.addAttribute("firstName", firstName);
        model.addAttribute("lastName", lastName);
        return "view2"; // Chuyển sang view2 và hiển thị dữ liệu
    }
}