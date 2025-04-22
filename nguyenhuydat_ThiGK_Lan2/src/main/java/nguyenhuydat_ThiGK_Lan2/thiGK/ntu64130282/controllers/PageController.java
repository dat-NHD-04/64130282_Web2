package nguyenhuydat_ThiGK_Lan2.thiGK.ntu64130282.controllers;
import java.util.ArrayList;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import nguyenhuydat_ThiGK_Lan2.thiGK.ntu64130282.models.Page;

@Controller
public class PageController {
	ArrayList<Page> dsPage = new ArrayList<>();
	 public PageController() {
		 dsPage.add(new Page("1", "Home", "home, index", "Welcome to Home Page", "4"));
	     dsPage.add(new Page("2", "About", "about, info", "About Us Page Content", "2"));
	     dsPage.add(new Page("3", "Services", "services, offers", "Our Services", "2"));
	     dsPage.add(new Page("4", "Contact", "contact, reach", "Contact Information", "5"));
	     dsPage.add(new Page("5", "Blog", "blog, articles", "Latest Blog Posts", "1"));
	}

	@GetMapping("/page/all")
	public String PageList(ModelMap m) {
		m.addAttribute("dsPage", dsPage);
		return "page/all";
	}
	
	@GetMapping("/page/new")
   public String AddNewPage() {
       return "page/new";
   }

	@PostMapping("/page/add")
   public String addPage(@RequestParam("pageName") String pageName,
                         @RequestParam("keyword") String keyword,
                         @RequestParam("content") String content,
                         @RequestParam("parentPageId") String parentPageId) {
       String newId = String.valueOf(dsPage.size() + 1);
       Page newPage = new Page(newId, pageName, keyword, content, parentPageId);
       dsPage.add(newPage);
       return "redirect:/page/all";
   }

	@GetMapping("/page/view/{id}")
	public String viewPage(@PathVariable("id") String id, ModelMap model) {
	    for (Page page : dsPage) {
	        if (page.getId().equals(id)) {
	            model.addAttribute("page", page);
	            break;
	        }
	    }
	    return "page/view";
	}
	
   @GetMapping("/page/delete/{id}")
   public String deletePage(@PathVariable("id") String id) {
       dsPage.removeIf(page -> page.getId().equals(id));
       return "redirect:/page/all";
   }
}
