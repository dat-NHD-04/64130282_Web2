package thiGK.ntu64130282.nguyenhuydat_ThiGK.controller;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;

import jakarta.servlet.http.HttpServletRequest;

@Controller
@RequestMapping("/page")
public class PageController {

    @GetMapping("/list")
    public String listPages(ModelMap model) {
        model.addAttribute("pages", pages);
        return "list";
    }

    @GetMapping("/addnew")
    public String addNewPageForm(ModelMap model) {
        return "addNew";
    }

    @PostMapping("/add")
    public String addPage(@RequestParam("id") int id, 
                          @RequestParam("pageName") String pageName, 
                          @RequestParam("keyword") String keyword, 
                          @RequestParam("content") String content, 
                          ModelMap model) {
        pages.add(new Page(id, pageName, keyword, content));
        model.addAttribute("pages", pages);
        return "list";
    }

    @GetMapping("/view/{id}")
    public String viewPage(@PathVariable int id, ModelMap model) {
        for (Page page : pages) {
            if (page.getId() == id) {
                model.addAttribute("page", page);
                return "view";
            }
        }
        return "error";
    }

    @GetMapping("/delete/{id}")
    public String deletePage(@PathVariable int id, ModelMap model) {
        pages.removeIf(page -> page.getId() == id);
        model.addAttribute("pages", pages);
        return "list";
    }
}
