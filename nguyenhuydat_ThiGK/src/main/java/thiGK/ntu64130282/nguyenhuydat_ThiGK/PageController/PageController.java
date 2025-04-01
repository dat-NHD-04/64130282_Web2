package thiGK.ntu64130282.nguyenhuydat_ThiGK.PageController;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;

import thiGK.ntu64130282.nguyenhuydat_ThiGK.model.Page;

@Controller
@RequestMapping("/dashboard")
public class PageController {
    private ArrayList<Page> pages = new ArrayList<>(Arrays.asList(
            new Page(1, "Trang chủ", "home", "/page/view/1", "/page/edit/1", "/page/delete/1"),
            new Page(2, "Giới thiệu", "about", "/page/view/2", "/page/edit/2", "/page/delete/2"),
            new Page(3, "Liên hệ", "contact", "/page/view/3", "/page/edit/3", "/page/delete/3")
    ));

    @GetMapping("/dashboard")
	public String dashboard() {
		return "dashboard";
	}
    
    @GetMapping("/page/list")
    public String listPages(ModelMap model) {
        model.addAttribute("pages", pages);
        return "pageList";
    }

    @GetMapping("/page/addnew")
    public String addNewPageForm() {
        return "pageAddnew";
    }

    @PostMapping("/page/add")
    public String addPage(@RequestParam("id") int id, 
                          @RequestParam("pageName") String pageName, 
                          @RequestParam("keyword") String keyword, 
                          ModelMap model) {
        String viewUrl = "/page/view/" + id;
        String editUrl = "/page/edit/" + id;
        String deleteUrl = "/page/delete/" + id;
        
        pages.add(new Page(id, pageName, keyword, viewUrl, editUrl, deleteUrl));
        model.addAttribute("pages", pages);
        return "pageList";
    }


        }

